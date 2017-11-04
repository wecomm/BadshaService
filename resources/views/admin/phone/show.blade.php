@extends('admin/layouts/app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        
        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List Of Phone</h3>
          </div>
          <a class="col-lg-offset-5 btn btn-success" href="{{route('phone.create')}}">Add New phone</a>
           @include('includes.message')
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Phone Com. Id</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </thead>
              <tbody>
              @foreach($phones as $phone)
                <tr>
                  <td>{{$phone->id}}</td>
                  <td>{{$phone->title}}</td>
                  <td>{{$phone->image}}</td>
                  <td>{{$phone->phone_company_id}}</td>
                  <td> <a href="{{'phone/'.$phone->id.'/edit'}}"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#myModal" ></span></a>  </td>

                  <form id="delete-form-{{$phone->id}}" method="post" action="{{route('phone.destroy',$phone->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                  </form>
                  <td> <a href="" onclick="if (confirm('Are you sure, You want to delete this?')) 
                  { 
                   event.preventDefault();
                   document.getElementById('delete-form-{{$phone->id}}').submit();
                  }
                    else{
                        event.preventDefault();
                    }">
                    <span class="glyphicon glyphicon-trash"></span></a> </td>
                </tr>
              @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Phone Com. Id</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    
  </section>
  <!-- /.content -->
</div>

@endsection


  @section('footerSection')
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });

    </script>

@endsection