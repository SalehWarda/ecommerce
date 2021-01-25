<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        //
        return view('dashboard.products.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProducts()
    {
        //
        $data=[];
        $data['brands']     = Brand::select('id')->get();
        $data['tags']       = Tag::select('id')->get();
        $data['categories'] = Category::select('id')->get();

        return view('dashboard.products.createProduct',$data);

    }


    public function storeProducts(GeneralProductRequest $request)
    {
        //

        // try {

        //     DB::beginTransaction();



        // if(!$request->has('is_active'))
        // $request->request->add(['is_active'=>0]);
        // else
        // $request->request->add(['is_active'=>1]);


        // // $category = Category::create([

        // //     'slug' => $request->slug,
        // //     'is_active' => $request->is_active,
        // // ]);

        // $category ->name = $request->name ;
        // $category->save();

        // DB::commit();

        // return redirect()->route('admin.mainCategories')->with([
        //     'message' => 'Created Successfuly.',
        //     'alert-type' => 'success',
        // ]);




        // } catch (\Exception $ex) {

        //     DB::rollBack();

        //     return redirect()->back()->with([
        //         'message' => 'Something is rong, Try again.',
        //         'alert-type' => 'danger',
        //     ]);


        // }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
