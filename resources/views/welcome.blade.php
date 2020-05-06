@extends('layout')

@section('content')

	<section class="posts container">
		@if(isset($title))
		<h3><small><mark>{{ $title }}</mark></small></h3>
		@endif
			

    @foreach($posts as $post)

		<article class="post">

		@if($post->photos->count() === 1)
		<figure class="img-cite"><img src="{{ $post->photos->first()->url }}" class="img-responsive" alt="" ></figure>
		
		@elseif($post->photos->count() > 1)

		<article class="post w-gallery">
			<div class="gallery-photos masonry">
			@foreach($post->photos->take(4) as $photo)
				<figure class="gallery-image">
				@if($loop->iteration === 4)
				<div class="overlay"> {{ $post->photos->count() }} Fotos+</div>
				@endif
			<img src="{{ $photo->url }}" class="img-responsive" alt="">
			</figure>
			@endforeach
			</div>
		</article>
		@elseif($post->iframe)

		<article class="post w-video">
			<div class="video">
				{!! $post->iframe !!}
			</div>
		</article>
		@endif
		</div>

			

			<div class="content-post">
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gray-1">{{ $post->published_at->diffForHumans()  }}</span> <!--format('M d')-->
					</div>
					<div class="post-category">
						<span class="category text-capitalize">
							<a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name  }}</a></span>
					</div>
				</header>
				<h1>{{$post->title}}</h1>
				<div class="divider"></div>
				<p>{{$post->excerpt}}</p>
				<footer class="container-flex space-between">
					<div class="read-more">
					<a href="blog/{{ $post->url }}" class="text-uppercase c-green">read more</a>
					</div>
					<div class="tags container-flex">
						@foreach($post->tags as $tag)
						<span class="tag c-gray-1 text-capitalize"><a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a></span>
					    @endforeach
					</div>
				</footer>
			</div>
		</article>

    @endforeach




	</section><!-- fin del div.posts.container -->

	{{ $posts->links() }}
	

	@stop