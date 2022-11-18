@extends('templates.html5up-future-imperfect.layouts.body_full')

@section('content')

	<article class="post">
        <header>
            <div class="title">
                <h2>{{$post->title}}</h2>
            </div>
 
        </header>
        <?php echo $post->content; ?>
    </article>

@stop