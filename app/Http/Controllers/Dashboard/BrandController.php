<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BrandController extends Controller
{

    public function brands()
    {
        //
        $brand = Brand::orderBy('id','desc')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.brand',compact('brand'));
    }


    public function createBrands()
    {
        //
        return view('dashboard.brands.createBrand');

    }


    public function storeBrands(BrandsRequest $request)
    {
        /* Validation */
        /* Insert DB*/



       try {

             DB::beginTransaction();



             $fileName = "";
             if ($request->has('photo')){
                 $fileName = $this-> uploadImage('brands', $request->photo);
             }




             if(!$request->has('is_active'))

              $request->request->add(['is_active' => 0]);
              else
              $request->request->add(['is_active' => 1]);


            $brand =  Brand::create([


                'is_active'  =>  $request->is_active,
                'photo'  =>  $fileName,

            ]);



            /* save Translation */

            $brand ->name = $request->name;

            $brand->save();



            DB::commit();

        return redirect()->route('admin.brands')->with([
            'message' => 'Created Successfuly.',
            'alert-type' => 'success',
        ]);


       } catch (\Exception $ex) {
           //throw $th;

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
    public function editBrands($id)
    {
        //

      $brand =  Brand::find($id);

      if(!$brand)
      return redirect()->route('admin.brands')->with([
        'message' => 'This brand does not exist.',
        'alert-type' => 'danger',
    ]);

    return view('dashboard.brands.editBrand',compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBrands(BrandsRequest $request, $id)
    {

        /* Validation */
        /* Insert DB*/

       try {


      $brand =  Brand::find($id);

      if(!$brand)
      return redirect()->route('admin.brands')->with([
        'message' => 'This brand does not exist.',
        'alert-type' => 'danger',
    ]);


        DB::beginTransaction();



        $fileName = "";
        if ($request->has('photo')){
            $fileName = $this-> uploadImage('brands', $request->photo);
        }




        if(!$request->has('is_active'))

         $request->request->add(['is_active' => 0]);
         else
         $request->request->add(['is_active' => 1]);


       $brand ->update([


           'is_active'  =>  $request->is_active,
           'photo'  =>  $fileName,

       ]);



       /* save Translation */

       $brand ->name = $request->name;

       $brand->save();



       DB::commit();

   return redirect()->route('admin.brands')->with([
       'message' => 'updated Successfuly.',
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
    public function destroyBrands($id)
    {
        //
        try {

            $brand =  Brand::find($id);

            if(!$brand)
            return redirect()->route('admin.brands')->with([
              'message' => 'This brand does not exist.',
              'alert-type' => 'danger',
          ]);

        //  $image = Str::after($brand->photo,'public/');
        //  $image = base_path('public/' . $image);
        //  unlink($image); //delete from folder

        $brand->translation->delete();

           $brand->delete();

           return redirect()->route('admin.brands')->with([
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
    return  $filename;

}
}
