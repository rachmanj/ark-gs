@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div style="height:550px"> <!--Please remove the height before using this page  style="height:600px"-->
          <h3>Welcome {{ auth()->user()->name }}</h3>

@endsection
