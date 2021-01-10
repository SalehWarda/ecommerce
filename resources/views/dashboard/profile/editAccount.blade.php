
@extends('dashboard.profileSettings')

@section('profileSettings')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid col-md-12">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">

                @include('dashboard.alerts.alert')
              <form class="form" action="{{ route('update.account',$profile->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')


                  <input type="hidden" name="id" value="{{ $profile->id  }}">


                     <div class="row">
                        <div class="col-md-6 ">

                    <div class="form-group">
                      <label for="complaintinput1">Name:</label>
                      <input type="text" value="{{ $profile->name }}" id="name" class="form-control round" placeholder=" "
                      name="name">

                      @error('name')
                      <span class="text-danger">{{ $message }}</span>

                      @enderror
                    </div>
                </div>

                <div class="col-md-6 ">

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" value="{{ $profile->email }}" id="email" class="form-control round" placeholder=" "
                      name="email">

                      @error('email')
                      <span class="text-danger">{{ $message }}</span>

                      @enderror
                    </div>
                    </div>
                </div>




                    <div class="form-group col-md-3 mt-3">
                      <h5>Profile Photo:</h5>
                  <img style="height: 30vh " src="{{ url($profile->photo) }}"  class="img-circle elevation-2" alt="User Image">
                  <input class="mt-3" value="" type="file" id="photo" name="photo">

                  @error('photo')
                  <span class="text-danger">{{ $message }}</span>

                  @enderror
                  </div>



                  <div class="form-actions">

                    <button type="submit" class="btn btn-primary">
                      <i class="la la-check-square-o"></i> Save Changes
                    </button>
                  </div>
                </form>
            <!-- /.card-body -->

          </div>
      </section>    <!-- /.card -->
      @endsection
