@extends('user/app')

@section('bg-img',('/user/img/login-black.jpg'))
@section('head')

@endsection
@section('title','Welcome to Home')
@section('sub-heading','')

@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
           Welcome to KenTien (homecoming)
       </div>
       <br>
	<div class="box-header with-border">
          <a class="col-lg-offset-5 btn btn-primary" href="{{ route('dashboard') }}">Access Admin</a>
          <div class="box-tools pull-right">
          </div>
        </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection
