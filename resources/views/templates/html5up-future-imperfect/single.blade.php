@extends('templates.html5up-future-imperfect.layouts.body')

@section('content')

	<article class="post">
        <header>
            <div class="title">
                <h2>{{$post->title}}</h2>
                <p><a href="#">{{$post->category->title}}</a></p>
            </div>
            <div class="meta">
                <time class="published" datetime="{{date("Y-m-d",strtotime($post->published_at))}}">{{date("Y-m-d",strtotime($post->published_at))}}</time>
				<a href="{{url('/author/'.($post->author->id??0))}}" class="author"><span class="name">{{$post->author->name??''}}</span></a>
            </div>
        </header>
        <span class="image featured"><img src="{{$post->featured_image}}" alt="" /></span>
        <?php echo $post->content; ?>
        <footer>
            <ul class="stats">
                <li><a href="#">{{$post->category->title}}</a></li>
                <li><a href="#" class="icon solid fa-heart">28</a></li>
                <li><a href="#" class="icon solid fa-comment">128</a></li>
            </ul>
        </footer>
    </article>

@stop