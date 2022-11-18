@extends('templates.html5up-future-imperfect.layouts.body')

@section('content')

	@foreach($posts as $k => $post)
		<!-- Post -->
		<article class="post">
			<header>
				<div class="title">
					<h2><a href="{{url('/'.$post->slug)}}">{{$post->title}}</a></h2>
					<p><a href="{{url('/category/'.$post->category->slug)}}">{{$post->category->title}}</a></p>
				</div>
				<div class="meta">
					<time class="published" datetime="{{date("Y-m-d",strtotime($post->published_at))}}">{{date("Y-m-d",strtotime($post->published_at))}}</time>
					<a href="{{url('/author/'.($post->author->id??0))}}" class="author"><span class="name">{{$post->author->name??''}}</span></a>
				</div>
			</header>
			<a href="{{url('/'.$post->slug)}}" class="image featured"><img src="{{$post->featured_image}}?t={{rand(0,9999)}}" alt="" /></a>
			<p>{{$post->intro}}</p>
			<footer>
				<ul class="actions">
					<li><a href="{{url('/'.$post->slug)}}" class="button large">Read More</a></li>
				</ul>
				
			</footer>
		</article>
	@endforeach

	<!-- Pagination -->
	@if ($posts->lastPage() > 1)
	<ul class="actions pagination">
		<li><a href="{{ $posts->previousPageUrl() }}" class="@if($posts->onFirstPage()) disabled @endif button large previous">Previous Page</a></li>
		<li><a href="{{ $posts->nextPageUrl() }}" class="@if(!$posts->hasMorePages()) disabled @endif button large next">Next Page</a></li>
	</ul>
	@endif

@stop