<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MainCategoryController extends Controller
{

    public function mainCategories()
    {
        //
     $maincategories =  Category::Parent()->orderBy('id','desc')->paginate(PAGINATION_COUNT);

        return view('dashboard.categories.mainCategories',compact('maincategories'));
    }






    public function createMainCategories()
    {
        //

        return view('dashboard.categories.createCategories');
    }





    public function storeMainCategories(MainCategoryRequest $request)
    {
        //
        try {

            DB::beginTransaction();

            $filePath = "";
        if ($request->has('photo')){
            $filePath = $this-> uploadImage('categories', $request->photo);
        }

        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);


        $category = Category::create([

            'slug' => $request->slug,
            'is_active' => $request->is_active,
            'photo' => $filePath
        ]);

        $category ->name = $request->name ;
        $category->save();

        DB::commit();

        return redirect()->route('admin.mainCategories')->with([
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






    public function editMainCategories($id)
    {
        //
      $category =  Category::find($id);

        if(!$category)

            return redirect()->route('admin.mainCategories')->with([
                'message' => 'This Category does not exist.',
                'alert-type' => 'danger',
            ]);

            return view('dashboard.categories.editCategories',compact('category'));
    }





    public function updateMainCategories(MainCategoryRequest $request, $id)
    {
        //
        try {





            $category =  Category::find($id);




           if(!$category)
           return redirect()->route('admin.mainCategories')->with([
            'message' => 'This Category does not exist.',
            'alert-type' => 'danger',
        ]);

        $filePath = "";
        if ($request->has('photo')){
            $filePath = $this-> uploadImage('categories', $request->photo);
        }


            if(!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
            else
            $request->request->add(['is_active' => 1]);



        $category->update([

            'slug' => $request->slug,
            'is_active' => $request->is_active,
            'photo' => $filePath
        ]);

        $category ->name = $request->name ;
        $category->save();

        return redirect()->route('admin.mainCategories')->with([
            'message' => 'Updated Successfuly.',
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


    public function destroyMainCategories($id)
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

          return redirect()->route('admin.mainCategories')->with([
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


    public function changeStatusMainCategories($id)
    {
        //
    }
}

