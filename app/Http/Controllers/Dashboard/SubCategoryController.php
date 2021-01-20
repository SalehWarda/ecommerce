<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{

    public function subCategories()
    {
        //

       $subCategories = Category::Child()->orderBy('id','desc')->paginate(PAGINATION_COUNT);

        return view('dashboard.categories.subCategories',compact('subCategories'));
    }


    public function createSubCategories()
    {
        //
        $maincategories =  Category::Parent()->orderBy('id','desc')->get();
        return view('dashboard.categories.createSubCategories',compact('maincategories'));
    }


    public function storeSubCategories(SubCategoryRequest $request)
    {
        /*Validate*/
        /*Insert DB*/

        try {

            DB::beginTransaction();

        $filePath = "";
        if ($request->has('photo')){
            $filePath = $this-> uploadImage('categories', $request->photo);
        }

        if(!$request->has('is_active'))
        $request->request->add(['is_active' => 0]);
        else
        $request->request->add(['is_active' => 1]);

       $category = Category::Create([

            'photo' => $filePath,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug,
            'is_active' => $request->is_active,

        ]);

        $category->name = $request->name;
        $category->save();

        DB::commit();


        return redirect()->route('admin.subCategories')->with([
            'message' => 'Created Successfuly.',
            'alert-type' => 'success',
        ]);



        } catch (\Exception $ex) {

            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Something is rong, Try again.',
                'alert-type' => 'danger',
            ]);


        }
    }


    public function show($id)
    {
        //
    }


    public function editSubCategories($id)
    {
        //

       $category = Category::find($id);

       if(!$category)
       return redirect()->route('admin.subCategories')->with([
        'message' => 'This Category does not exist.',
        'alert-type' => 'danger',
    ]);

    $maincategories =  Category::Parent()->orderBy('id','desc')->get();

    return view('dashboard.categories.editSubCategories',compact('category','maincategories'));

    }


    public function updateSubCategories(SubCategoryRequest $request, $id)
    {
        //
        try {

            $category = Category::find($id);

            if(!$category)
            return redirect()->route('admin.subCategories')->with([
             'message' => 'This Category does not exist.',
             'alert-type' => 'danger',
         ]);

         DB::beginTransaction();


         $filePath = "";
         if ($request->has('photo')){
             $filePath = $this-> uploadImage('categories', $request->photo);
         }

         if(!$request->has('is_active'))
         $request->request->add(['is_active' => 0]);
         else
         $request->request->add(['is_active' => 1]);

         $category->update([

            'photo' => $filePath,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug,
            'is_active' => $request->is_active,

         ]);

         $category->name = $request->name;
         $category->save();

         DB::commit();


        return redirect()->route('admin.subCategories')->with([
            'message' => 'Updated Successfuly.',
            'alert-type' => 'success',
        ]);



        } catch (\Exception $ex) {

            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Something is rong, Try again.',
                'alert-type' => 'danger',
            ]);
        }
    }


    public function destroySubCategories($id)
    {
        //
        try {

            $category = Category::find($id);

            if(!$category)
            return redirect()->back()->with([
             'message' => 'This Category does not exist.',
             'alert-type' => 'danger',
         ]);

         $image = Str::after($category->photo,'public/');
         $image = base_path('public/' . $image);
         unlink($image); //delete from folder

           $category->delete();

           return redirect()->route('admin.subCategories')->with([
             'message' => 'Deleted Successfully  ',
             'alert-type' => 'success',
         ]);



         } catch (\Exception $ex) {

             return redirect()->back()->with([
                 'message' => 'Something is rong, Try again.',
                 'alert-type' => 'danger',
             ]);



         }

    }

    protected function uploadImage($folder, $image)
{
    $image->store('/',$folder);
    $filename = $image->hashName();
    $path = '/assets/admin/images/'. $folder . '/' . $filename;
    return $path;
}

}
