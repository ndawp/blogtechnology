@extends('user/app')
@section('head')
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="/css/foundation.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/responsive.css" type="text/css" media="screen">
@endsection
@section('bg-img',('user/img/1.jpg'))
@section('title', 'Techology Blog')
@section('subheading', 'Blog Công Nghệ Mới')

@section('main-content')
  
  <section class="container row clearfix">
    <section class="inner-container clearfix">
      <!-- Content -->

      <section id="content" class="eight column row pull-left">
        @include('user/layouts/slide')
       <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach ($posts as $post)
        <div class="post-preview">
          <a href="{{ route ('post', $post->slug) }}">
            <h2 class="post-title">
              {{ $post->title }}
            </h2>
            <h3 class="post-subtitle">
              {{ $post->subtitle }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">KenTien</a>
            {{ $post->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
        <hr>
        
        <!-- Pager -->
        <ul class="pager">
            <li class="next">
                {{ $posts->links() }}
            </li>
        </ul>
      </div>
    </div>

      </section>
      <!-- Content -->

      <!-- Sidebar -->
      @include('user/layouts/sidebar')
      <!-- End Sidebar -->
      <!-- Footer -->
      <!-- End Footer -->
    </section>
    <!-- End Inner Container -->
  </section>

@endsection