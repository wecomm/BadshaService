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
          <form role="form" action="{{route('page.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="page">page Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="page Name">
                </div>

                <div class="box-body pad">
                  <textarea name="content" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                </div>
                
                <div class="form-group" >
              <input type="submit" class="btn btn-primary">
              <a href="{{route('page.index')}}" class="btn btn-warning">Back</a>
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

@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.7.2/full/ckeditor.js"></script>


  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection