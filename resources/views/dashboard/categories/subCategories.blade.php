@extends('layouts.dashboard')

@section('title','eCommerce | Sub Categories')


@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub-Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Sub-Categories</li>
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
          <h3 class="card-title">Sub-Categories</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>


            <a class="btn btn-secondary btn-sm float-sm-right mr-2"  href="{{ route('admin.subCategories.create') }}">
                <i class="fas fa-plus ">
                </i>
                 New Sub-Categories
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
                      <th style="width: 10%">
                         Name:
                      </th>
                      <th style="width: 15%">
                        Main Category
                      </th>
                      <th style="width: 25%">
                          Slug
                      </th>
                      <th style="width: 15%">
                          Photo
                      </th>
                      <th style="width: 15%" class="text-center">
                          Status
                      </th>
                      <th style="width: 25%">
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody>

                @foreach ($subCategories as $subCategory)

                <tr>

                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            {{ $subCategory->name }}
                        </a>
                        <br/>
                        <small>
                            Created  {{ $subCategory->created_at }}
                        </small>
                    </td>
                    <td>
                        <a>
                            {{ $subCategory->_Parent->name }}
                        </a>

                    </td>
                    <td>
                        {{ $subCategory->slug }}
                    </td>
                    <td >
                        <img style="width: 150px; height: 100px;" src="{{ url($subCategory->photo) }}" alt="">
                    </td>
                    <td class="project-state">

                        <span class="badge badge-dark"> {{ $subCategory->getActive() }}</span>

                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.subCategories.edit', $subCategory->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('admin.subCategories.delete', $subCategory->id) }}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>

                @endforeach


              </tbody>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <span class="text-center">
        {{ $subCategories->links("pagination::bootstrap-4") }}

     </span>
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
