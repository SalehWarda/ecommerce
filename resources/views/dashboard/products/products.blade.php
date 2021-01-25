@extends('layouts.dashboard')

@section('title','eCommerce | Products')


@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @include('dashboard.alerts.alert')
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>


            <a class="btn btn-secondary btn-sm float-sm-right mr-2"  href="{{ route('admin.products.general.create') }}">
                <i class="fas fa-plus ">
                </i>
                 Add Product
              </a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 15%">
                        Products Name
                      </th>
                      <th style="width: 15%">
                          Slug
                      </th>
                      <th style="width: 15%">
                          Photo
                      </th>
                      <th style="width: 15%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody>



                <tr>

                    <td>
                        #
                    </td>
                    <td>
                        <a>

                        </a>
                        <br/>
                        <small>
                            Created
                        </small>
                    </td>
                    <td>

                    </td>
                    <td >
                        <img style="width: 150px; height: 100px;" src="" alt="">
                    </td>
                    <td class="project-state">

                        <span class="badge badge-dark"> </span>

                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>



              </tbody>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      {{-- <span class="text-center">
        {{ $maincategories->links("pagination::bootstrap-4") }}

     </span> --}}
     {{-- <style>
       .w-5{

           display:none;
       }

     </style> --}}

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->




@endsection
