    <h5 class="sidebartitle">{{__('Navigation')}}</h5>

    <ul class="nav nav-pills flex-column mb-sm-auto mb-0  nav-stacked nav-admin">
        <li @if(Route::currentRouteName()=="admin-dashboard") class="active" @endif><a class="nav-link" href="{{ route('admin-dashboard') }}"><i class="fa fa-home"></i> <span>{{__('Dashboard')}}</span></a></li>

        <li @if(Route::currentRouteName()=="admin-category") class="active" @endif><a class="nav-link" href="{{ route('admin-category') }}"><i class="fa fa-list"></i> <span>{{__('Categories')}}</span></a></li>

        <li class="nav-parent opened @if(Str::is('admin-post*', Route::currentRouteName())) active @endif>"><a class="nav-link" href="#"><i class="fa fa-edit"></i> <span>{{__('Posts')}}</span></a>
            <ul class="children" style="@if(Str::is('admin-post*', Route::currentRouteName())) display:block; @endif>">
                <li class="@if(Str::is('admin-post*', Route::currentRouteName()) && request()->type=="article") active @endif>"><a class="nav-link" href="{{ route('admin-post').'?type=article' }}"><i class="fa fa-edit"></i> <span>{{__('Articles')}}</span></a></li>
                <li class="@if(Str::is('admin-post*', Route::currentRouteName()) && request()->type=="news") active @endif>"><a class="nav-link" href="{{ route('admin-post').'?type=news' }}"><i class="fa fa-edit"></i> <span>{{__('News')}}</span></a></li>
                <li class="@if(Str::is('admin-post*', Route::currentRouteName()) && request()->type=="page") active @endif>"><a class="nav-link" href="{{ route('admin-post').'?type=page' }}"><i class="fa fa-edit"></i> <span>{{__('Pages')}}</span></a></li>
            </ul>
        </li>

        <li @if(Route::currentRouteName()=="admin-menu") class="active" @endif><a class="nav-link" href="{{ route('admin-menu') }}"><i class="fa fa-bars"></i> <span>{{__('Menus')}}</span></a></li>

        <li @if(Route::currentRouteName()=="admin-config") class="active" @endif><a class="nav-link" href="{{ route('admin-config') }}"><i class="fa fa-cog"></i> <span>{{__('Settings')}}</span></a></li>
    </ul>