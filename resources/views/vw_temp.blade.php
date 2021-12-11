@extends('layout.vw_app')

@section('content')
<!-- Content Header (Page header) -->
<br>
<section class="content-header">

      <h1>
        Welcome {{ session('UNAME') }}!!!
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
      </ol>
      <h3>{{date('D ,d-m-Y H:i:s')}}</h3>
      <h4>checking cookie retrieving or not: {{Cookie::get('cook_uname');}}</h4>
    </section>


@endsection