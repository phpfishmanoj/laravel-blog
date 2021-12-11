@extends('layout.vw_app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">

    <h1>
        Blog POST List
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick List</h3>
                    <a href="{{url('blog-add')}}" class="btn btn-primary pull-right">Create Post</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.no</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($fetch_post_data))
                            <?php $i=1; ?>
                            @foreach ($fetch_post_data as $fval)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$fval->title}}</td>
                                <td>{{$fval->description}}</td>
                                <td>
                                    @if ($fval->status==0)
                                        <span class="alert alert-danger">Inactive</span>
                                    @else
                                    <span class="text text-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('blog-add/'.$fval->post_id)}}" class="btn btn-sm btn-primary" title="Edit">Edit</a>
                                    <a href="{{url('blog-delete/'.$fval->post_id)}}" class="btn btn-sm btn-danger" title="Delete">Delete</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            
                            @endif

                            
                        </tbody>
                        <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection