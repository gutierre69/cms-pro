@extends('templates.html5up-future-imperfect.layouts.body_full')

@section('content')

	<article class="post">
        <header>
            <div class="title">
                <h2>Contact Us</h2>
            </div>
 
        </header>

        @if (session('success'))
        <blockquote>{{ session('success') }}</blockquote>
        @endif

        @if(isset($error))
        <blockquote>{{$error}}</blockquote>
        @endif

        <form method="post" action="{{url('/contact')}}">
            {{csrf_field()}}
            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="name" id="name" value="{{$name??''}}" placeholder="Name" required />
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="email" name="email" id="email" value="{{$email??''}}" placeholder="Email" required />
                </div>
                

                <div class="col-12">
                    <textarea name="message" id="message" placeholder="Enter your message" rows="6" required>{{$message??''}}</textarea>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Send Message" /></li>
                    </ul>
                </div>
            </div>
        </form>

    </article>

@stop