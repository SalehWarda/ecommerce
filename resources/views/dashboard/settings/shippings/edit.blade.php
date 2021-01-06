@extends('dashboard.settings')

@section('settings')

<div class="card ">
    <div class="card-header p-2 ">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'edit.shippings.methods'.('free')) active @endif" href="{{ route('edit.shippings.methods',['type'=>'free']) }}" >Free Shipping</a></li>
        <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'edit.shippings.methods'.('inner')) active @endif" href="{{ route('edit.shippings.methods',['type'=>'inner']) }}" >Local Shipping</a></li>
        <li class="nav-item"><a class="nav-link  @if(Route::current()->getName() == 'edit.shippings.methods'.('outer')) active @endif" href="{{ route('edit.shippings.methods',['type'=>'outer']) }}" >Outer Shipping</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">



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

        <!-- /.tab-pane -->
      </div>

    </div><!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection
