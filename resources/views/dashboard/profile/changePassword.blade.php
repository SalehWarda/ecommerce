
@extends('dashboard.profileSettings')

@section('profileSettings')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid col-md-12">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">


                @include('dashboard.alerts.alert')

              <form class="form" action="{{ route('update.password',$password->id) }}" method="POST" >
                  @csrf
                  @method('PUT')


                    <input type="hidden" name="id" value="{{ $password->id  }}">


                    <div class="col-md-6">
                    <div class="form-group">

                      <input type="password" value="" id="current_password" class="form-control round" placeholder="Current Password"
                      name="current_password">

                      @error('current_password')
                      <span class="text-danger">{{ $message }}</span>

                      @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">

                      <input type="password" value="" id="new_password" class="form-control round" placeholder="New Password"
                      name="new_password">

                      @error('new_password')
                      <span class="text-danger">{{ $message }}</span>

                      @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        <input type="password" value="" id="password_confirmation" class="form-control round" placeholder="Re-enter new Password "
                        name="password_confirmation">

                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>
                    </div>



                  <div class="form-actions">

                    <button type="submit" class="btn btn-primary ml-2">
                      <i class="la la-check-square-o"></i> Change Password
                    </button>
                  </div>
                </form>
            <!-- /.card-body -->


        </div>

    </div>
</div>
      </section>    <!-- /.card -->
      @endsection
