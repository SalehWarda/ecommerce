@extends('layouts.dashboard')

@section('title','eCommerce | Create Product')


@section('content')




  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
              <li class="breadcrumb-item active">Create Product</li>
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


              <h3 class="card-title">Create Product</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <div class="card-body">

                @include('dashboard.alerts.alert')

                <form class ="form" action="{{ route('admin.products.general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf





                      <div class="row">

                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="name">Product Name:</label>
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

                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="description"> Description</label>
                            <textarea id="description" name="description" class="form-control" >{{ old('description') }}</textarea>
                           @error('description')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                      </div>
                      </div>

                      <div class="col-md-6 ">
                      <div class="form-group">
                           <label for="short_description">Short Description</label>
                            <textarea id="short_description" name="short_description" class="form-control" >{{ old('short_description') }}</textarea>
                           @error('short_description')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                      </div>
                      </div>

                      <div class="col-6 col-sm-4">
                        <div class="form-group">
                          <label> Categories:</label>
                          <div class="select2-purple">
                            <select class="select2" name="categories[]" multiple="multiple" data-placeholder="Select  Category" data-dropdown-css-class="select2-purple" style="width: 100%;">

                                @if ($categories && $categories->count() > 0)

                                   @foreach ($categories as $category)

                                   <option value="{{ $category->id }}">{{ $category->name }}</option>

                                   @endforeach

                                @endif


                            </select>
                            @error('categories')

                                <span class="text-danger">{{ $message }}</span>

                           @enderror
                          </div>
                        </div>
                        <!-- /.form-group -->
                      </div>

                      <div class="col-6 col-sm-4">
                        <div class="form-group">
                          <label>Tags:</label>
                          <div class="select2-purple">
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select Tags" data-dropdown-css-class="select2-purple" style="width: 100%;">


                                @if ($tags && $tags->count() > 0)

                                @foreach ($tags as $tag)

                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>

                                @endforeach

                             @endif



                            </select>
                            @error('tags')

                            <span class="text-danger">{{ $message }}</span>

                       @enderror
                          </div>
                        </div>
                        <!-- /.form-group -->
                      </div>

                      <div class="col-md-4 ">
                        <div class="form-group">
                              <label for="brands">Brand:</label>
                              <select id="brands" name="brands" class="form-control custom-select">
                                 <option selected disabled>Select Brand</option>



                                 @if ($brands && $brands->count() > 0)

                                 @foreach ($brands as $brand)

                                 <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                                 @endforeach

                              @endif




                              </select>
                              @error('brands')
                              <span class="text-danger">{{ $message }}</span>

                              @enderror

                         </div>
                       </div>


                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label for="is_active">Status:</label>
                          <input type="checkbox" name="is_active"  checked  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          @error('is_active')

                               <span class="text-danger">{{ $message }}</span>

                          @enderror
                     </div>
                     </div>

                      </div>







                   <div class="row">
                        <div class="col-md-12">
                           <a href="#" class="btn btn-danger mr-2" onclick="history.go();">Cancel </a>
                          <input type="submit" value="Save" class="btn btn-primary ">
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
