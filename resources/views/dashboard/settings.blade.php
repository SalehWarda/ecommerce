@extends('layouts.dashboard')

@section('title','eCommerce | Store Settings')


@section('content')




  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
         <section class="content-header">
           <div class="container-fluid">
             <div class="row mb-2">
               <div class="col-sm-6">
                 <h1>Store Settings</h1>
               </div>
                 <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">Store Settings</a></li>
                        <li class="breadcrumb-item  active">General Store Settings</li>
                      </ol>
                 </div>
             </div>
          </div><!-- /.container-fluid -->
       </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card  card-secondary">
              <div class="card-header ">
                <h3 class="card-title">Store Settings</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">



<div class="page-inner" >

    <!-- .page-section -->
    <div class="page-section" >
      <!-- grid row -->
      <div class="row" >
        <!-- grid column -->
        <div class="col-lg-4" >
          <!-- .card -->
          <div class="card-header card-fluid ml-5 p-0 card-secondary" >

            <h6 class="card-header" style="font-size: 20px;"> General Store Settings </h6>


            <div class="list-group" >

                <a  href="{{ route('edit.shippings.methods',('free')) }}" class=" list-group-item list-group-item-action  @if(Request::is( app()->getLocale().'/admin/storeSettings/shipping-methods*')) active @endif"> Shipping Methods</a>
                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</i></a>
                <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
              </div>
            <!-- /.nav -->
          </div>
                  <!-- /.card -->
        </div>
        <!-- /grid column -->
        <!-- grid column -->

        <div class="col-md-8">

            @yield('settings')
          </div>

        <!-- /grid column -->
      </div>
      <!-- /grid row -->
    </div>
    <!-- /.page-section -->
  </div>
  <!-- /.page-inner -->



              </div>

            </div>
            <!-- /.card -->
          </div>
      </div>
     </div>
   </section>
<!-- /.content -->
 </div>
<!-- /.content-wrapper -->



@endsection
