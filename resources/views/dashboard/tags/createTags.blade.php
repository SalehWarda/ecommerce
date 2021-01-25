@extends('layouts.dashboard')

@section('title','eCommerce | Create Tag')


@section('content')




  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Tag</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.tags') }}">Tags</a></li>
              <li class="breadcrumb-item active">Create Tag</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >

      <div class="container-fluid col-md-9">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">


              <h3 class="card-title">Create Tag</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <div class="card-body">

                @include('dashboard.alerts.alert')

                <form class ="form" action="{{ route('admin.tags.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf



                      <div class="row">
                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="name">Name Tag:</label>
                           <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" >
                           @error('name')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                      </div>
                      </div>


                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="slug">Slug:</label>
                           <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="form-control" >
                           @error('slug')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                      </div>
                      </div>


                      </div>





                   <div class="row">
                        <div class="col-12">
                           <a href="#" class="btn btn-danger mr-2" onclick="history.go();">Cancel </a>
                          <input type="submit" value="Save " class="btn btn-primary ">
                        </div>
                   </div>

              </form>

            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>


    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


  @endsection
