<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function settings(){

     return view('dashboard.settings');

     }



    public function editShippingMethods($type)
    {
        //
        if($type === 'free'){

            $shippingMethod = Setting::where('key','free_shipping_lable')->first();


        }elseif($type === 'inner'){

            $shippingMethod = Setting::where('key','local_lable')->first();


        }elseif($type === 'outer'){

            $shippingMethod = Setting::where('key','outer_lable')->first();

        }
        return view('dashboard.settings.shippings.edit',compact('shippingMethod'));



    }


    public function updateShippingMethods(ShippingsRequest $request, $id)
    {
        //
        /* Validation by Request */

        /* Update to db */

          try {

            $shippingMethod =  Setting::find($id);

            $shippingMethod ->update([

                'plain_value' => $request->plain_value
            ]);

            $shippingMethod ->value = $request->value ;
            $shippingMethod->save();

            return redirect()->back()->with([
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
