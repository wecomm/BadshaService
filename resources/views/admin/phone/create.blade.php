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
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Titles</h3>
          </div>
			@include('includes.message')
        
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{route('phone.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="company">Phone Name</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Name">
                </div>

                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                </div>
                <div class="form-group">
                  <label>Select</label>
                  <label>Select Disabled</label>
                  <select class="form-control" name="company_id">
                    @foreach($companies as $company_name)
                    <option value="{{$company_name->id}}">{{$company_name->title}}</option >
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group" >
              <input type="submit" class="btn btn-primary">
              <a href="{{route('phone.index')}}" class="btn btn-warning">Back</a>
            </div>
              </div>
              
            </div>
            <!-- /.box-body -->
            
          
             
          </form>
          
        </div>
        <!-- /.box -->

        
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
</div>>  
@endsection  