<div class="flexslider mb25">
	<ul class="slides no-bullet inline-list m0">
        @foreach($posts as $post)
		<li>
     		<a href="{{route('post',$post->slug)}}">
                <img alt="{{ $post->image }}" src="{{ $post->image }}"> 
            </a>                    
     		<div class="flex-caption">
                <div class="desc">
                	<h1><a href="{{route('post',$post->slug)}}">{{ $post->title }}</a></h1>
                	<p>{{ $post->subtitle }}</p>
                </div>
            </div>
		</li>
		@endforeach
	</ul>
</div>

