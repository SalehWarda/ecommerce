@extends('dashboard.settings')

@section('settings')


<div class="card ">

    <div class="card-body">


<div class="col-12 col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0" >
        <ul class="nav nav-tabs "  id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item" >
            <a class="nav-link  @if(Request::is( app()->getLocale().'/admin/settings/shipping-methods/free')) active @endif" id="custom-tabs-four-home-tab"  href="{{ route('edit.shippings.methods',['type'=>'free']) }}" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Free Shipping</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link  @if(Request::is( app()->getLocale().'/admin/settings/shipping-methods/inner')) active @endif" id="custom-tabs-four-profile-tab"  href="{{ route('edit.shippings.methods',['type'=>'inner']) }}" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Local Shipping</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  @if(Request::is( app()->getLocale().'/admin/settings/shipping-methods/outer')) active @endif" id="custom-tabs-four-messages-tab" href="{{ route('edit.shippings.methods',['type'=>'outer']) }}" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">outer Shipping</a>
          </li>

        </ul>
      </div>



    </div>


    @include('dashboard.alerts.alert')
    <form class ="form" action="{{ route('update.shippings.methods',$shippingMethod->id) }}" method="POST" >
        @csrf

        @method('PUT')


            <input type="hidden" name="id" value="{{ $shippingMethod->id  }}">

        <div class="row">
        <div class="col-md-6 ">
        <div class="form-group">
            <label for="value">Name Of Shipping:</label>
            <input type="text" id="value" name="value"  class="form-control" value="{{  $shippingMethod->value }}">
              @error('value')

                 <span class="text-danger">{{ $message }}</span>

              @enderror
       </div>
       </div>

       <div class="col-md-6 ">
        <div class="form-group">
            <label for="plain_value">Value Of Shipping:</label>
            <input type="number" id="plain_value" value="{{  $shippingMethod->plain_value }}" name="plain_value" class="form-control" >
              @error('plain_value')

                 <span class="text-danger">{{ $message }}</span>

              @enderror
       </div>
       </div>
       </div>

       <div class="row">
            <div class="col-12">
               <button type="button" class="btn btn-danger mr-2"
               onclick="history.go();">

               <i class="ft-x"></i> Cancel</button>
              <button type="submit"  class="btn btn-primary  ">Save Changes</button>
            </div>
       </div>

  </form>

  </div>









    </div><!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection
