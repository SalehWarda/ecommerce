@extends('layouts.dashboard')

@section('title','eCommerce | Tags')


@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tags</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Tags</li>
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
          <h3 class="card-title">Tags</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>


            <a class="btn btn-secondary btn-sm float-sm-right mr-2"  href="{{ route('admin.tags.create') }}">
                <i class="fas fa-plus ">
                </i>
                 New Tag
              </a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 25%">
                          #
                      </th>
                      <th style="width: 25%">
                        Tags Name
                      </th>

                      <th style="width: 25%" class="text-center">
                          Slug
                      </th>
                      <th style="width: 25%">
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody>

             @foreach ($tags as $tag)


             <tr>

                <td>
                    #
                </td>
                <td>
                    <a>
                        {{  $tag->name }}
                    </a>
                    <br/>
                    <small>
                        Created: {{  $tag->created_at }}
                    </small>
                </td>

                <td class="project-state">

                    {{  $tag->slug }}
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.tags.edit', $tag->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{ route('admin.tags.delete', $tag->id) }}">
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
        {{ $tags->links("pagination::bootstrap-4") }}

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
