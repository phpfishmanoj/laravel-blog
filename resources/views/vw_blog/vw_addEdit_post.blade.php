@extends('layout.vw_app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">

      <h1>
          <span>Add/Update Post</span>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick <?php echo !empty($edit_post_data)?'Edit':'Add'; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{url('blog-add-action')}}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="edit_id" value="{{ !empty($edit_post_data)?$edit_post_data->post_id:'' }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ !empty($edit_post_data)?$edit_post_data->title:'' }}">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea  class="form-control" id="" name="description" placeholder="Enter description">{{ !empty($edit_post_data)?$edit_post_data->description:'' }}</textarea>
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div> -->
                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ !empty($edit_post_data)?'Update':'Submit' }}</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
       
      </div>
      <!-- /.row -->
    </section>
@endsection