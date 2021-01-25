@extends('layouts.dashboard')

@section('title','eCommerce | Edit Sub-Category')


@section('content')




  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Sub-Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.subCategories') }}">Sub-Categories</a></li>
              <li class="breadcrumb-item active">Edit Sub-Category</li>
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


              <h3 class="card-title">Edit Sub-Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <div class="card-body">

                @include('dashboard.alerts.alert')

                <form class ="form" action="{{ route('admin.subCategories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $category->id }}">



                    <div class="form-group" >

                        <div class="text-center">
                    <img style="height: 40vh " src="" class="img-circle elevation-2 height-150" alt="Sub-Category Image" >
                </div>
                    <input class="mt-3" type="file" id="photo" name="photo">

                    @error('photo')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>


                      <div class="row">


                    <div class="col-md-12 ">
                        <div class="form-group">
                              <label for="parent_id">Main Category:</label>
                              <select id="parent_id" name="parent_id" class="form-control custom-select">
                                 <option selected disabled>Select one</option>
                                 @foreach ($maincategories as $maincategory)

                                 <option value="{{ $maincategory->id }} "  @if($category->parent_id == $maincategory->id ) selected @endif>{{ $maincategory->name }}</option>

                                 @endforeach


                              </select>
                              @error('parent_id')
                              <span class="text-danger">{{ $message }}</span>

                              @enderror

                         </div>
                       </div>

                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="name">Name Sub-Category:</label>
                           <input type="text" id="name" name="name" value="{{ old('name', $category->name ) }}" class="form-control" >
                           @error('name')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                      </div>
                      </div>


                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="slug">Slug:</label>
                           <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" class="form-control" >
                           @error('slug')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                      </div>
                      </div>


                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label for="is_active">Status:</label>
                          <input type="checkbox" name="is_active" @if($category->is_active == 1) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          @error('is_active')

                               <span class="text-danger">{{ $message }}</span>

                          @enderror
                     </div>
                     </div>

                      </div>







                   <div class="row">
                        <div class="col-12">
                           <a href="#" class="btn btn-danger mr-2" onclick="history.go();">Cancel </a>
                          <input type="submit" value="Save Changes" class="btn btn-primary ">
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
