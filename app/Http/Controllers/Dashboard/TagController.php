<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tags()
    {
        //
        $tags = Tag::orderBy('id','desc')->paginate(PAGINATION_COUNT);
        return view('dashboard.tags.tags',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTags()
    {
        //

     return view('dashboard.tags.createTags');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTags(TagRequest $request)
    {
        /*Validation*/
        /*Insert DB*/

        try {

            DB::beginTransaction();

            $tags = Tag::create([

                'slug'  => $request->slug,
            ]);

            $tags->name =$request->name;
            $tags->save();

            DB::commit();

            return redirect()->route('admin.tags')->with([
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTags($id)
    {
        //
        $tags = Tag::find($id);

        if(!$tags)
             return redirect()->route('admin.tags')->with([
                'message' => 'This Tag does not exist.',
                'alert-type' => 'danger',
            ]);

            return view('dashboard.tags.editTags',compact('tags'));    }



    public function updateTags(TagRequest $request, $id)
    {
        //

        /*Validation*/
        /*Insert DB*/

        try {

            $tags = Tag::find($id);

            if(!$tags)
                 return redirect()->route('admin.tags')->with([
                    'message' => 'This Tag does not exist.',
                    'alert-type' => 'danger',
                ]);

            DB::beginTransaction();

            $tags->update([

                'slug'  => $request->slug,
            ]);

            $tags->name =$request->name;
            $tags->save();

            DB::commit();

            return redirect()->route('admin.tags')->with([
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTags($id)
    {
        //

        try {

            $tags = Tag::find($id);

            if(!$tags)
            return redirect()->back()->with([
             'message' => 'This Tag does not exist.',
             'alert-type' => 'danger',
         ]);


        $tags->translation->delete();
           $tags->delete();

           return redirect()->route('admin.tags')->with([
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
}
