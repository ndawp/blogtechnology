@extends('user/app')

@section('bg-img',url($post->image))
@section('title', $post->title)
@section('subheading', $post->subtitle)

@section('main-content')
<!-- Post Content -->
  <article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <small>Created at {{ $post->created_at }}</small>
                @foreach ($post->categories as $category)
                <small class="pull-right" style="margin-right: 20px">  
                    <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                </small>
                @endforeach
                {!! htmlspecialchars_decode($post->body) !!}

                {{-- Tag clouds --}}
                <h3>Tag Clouds</h3>
                @foreach ($post->tags as $tag)
                <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">  
                   {{ $tag->name }}
                   </small></a>
                @endforeach
            </div>
            
        </div>
    </div>
</article>

  <hr>

@endsection