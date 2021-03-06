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
          <form role="form" action="{{route('repair.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="repair">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Repair Title">
                </div>
				<div class="form-group">
				  <label>Select</label>
				  <label>Select Disabled</label>
				  <select class="form-control" name="phone_id">
				    @foreach($phones as $phone_name)
    				    <option value="{{$phone_name->id}}">{{$phone_name->title}}</option >
    				    @endforeach
				  </select>
				</div>
                
				<div class="form-group">
				  <label for="price">Price</label>
				  <input type="number" class="form-control" id="price" name="price" placeholder="Price">
				</div>
				<div class="form-group">
                  <label for="time">Repair Time</label>
                  <input type="text" class="form-control" id="repair_time" name="repair_time" placeholder="Repair Time">
                </div>
                <div class="form-group">
                  <label for="guarantee">Guarantee</label>
                  <input type="text" class="form-control" id="guarantee" name="guarantee" placeholder="Guarantee">
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                </div>
                <div class="box-body pad">
                  <textarea name="content" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                </div>
                
                <div class="form-group" >
              <input type="submit" class="btn btn-primary">
              <a href="{{route('repair.index')}}" class="btn btn-warning">Back</a>
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