@extends('admin.layouts.admin')

@section('content')
<div class="contentpanel">
    <div class="row">
        <div class="col-md-12">
            @if($password_alert)
                <div class="alert alert-danger" role="alert">
                    {{__('Consider changing your password immediately.')}} <a href="{{ route('admin-user-password') }}">{{__('Change Now!')}}</a>
                </div>
            @endif

            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">{{ __('Categories') }}</div>
                        <div class="card-body">
                            <h3>{{$categories}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">{{ __('Articles') }}</div>
                        <div class="card-body">
                            <h3>{{$articles}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">{{ __('News') }}</div>
                        <div class="card-body">
                            <h3>{{$news}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">{{ __('Pages') }}</div>
                        <div class="card-body">
                            <h3>{{$pages}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">{{ __('Users') }}</div>
                        <div class="card-body">
                            <h3>{{$users}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">{{ __('Settings') }}</div>
                        <div class="card-body">
                            <h3>{{$settings}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            


        </div>
    </div>
</div>
@endsection
