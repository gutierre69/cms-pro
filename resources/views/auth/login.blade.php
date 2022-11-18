@extends('admin.layouts.admin_auth')

@section('content')
<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1>{{ENV('DEVELOPER_NAME')}} <span>[</span> Admin <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>{{__('Welcome to your admin panel')}}</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> {{__('Pages Manager')}}</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> {{__('News and Articles Manager')}}</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> {{__('Users Registers')}}</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> {{__('Galery, Pics, Files')}}</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> {{__('and more...')}}</li>
                    </ul>
                    <div class="mb20"></div>
                    <strong>{{__('Forget your password?')}}</strong><br />
                    <strong><a href="{{ENV('DEVELOPER_URL')}}" target="_blank">{{__('Talk your developer now!')}}</a></strong>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4 class="nomargin">{{__('Restrict Area')}}</h4>
                    <p class="mt5 mb20">{{__('Login to access')}}</p>
                
                    <input id="email" type="email" class="form-control uname @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class="form-control pword @error('password') is-invalid @enderror" placeholder="{{__('Password')}}" name="password" required autocomplete="current-password" />

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if (Route::has('password.request'))
                    <!-- <a href="{{ route('password.request') }}"><small>Esqueceu sua senha?</small></a> -->
                    @endif

                    <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{__('Remember me')}}</label>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">{{__('Login')}}</button>
                    
                </form>


                
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="float-start">
                A Laravel CMS
            </div>
            <div class="float-end">
                by: <a href="{{ENV('DEVELOPER_URL')}}" target="_blank">{{ENV('DEVELOPER_NAME')}}</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>
@endsection
