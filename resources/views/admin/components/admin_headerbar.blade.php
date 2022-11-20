    <div class="headerbar">
    
        <a class="menutoggle"><i class="fa fa-bars"></i></a>
        
        <div class="float-start" style="padding:5px;">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-warning"><i class="fa fa-eye"></i> {{__('View Website')}}</a>
        </div>
        
        <div class="header-right">
            <ul class="headermenu ">

            <li class="dropdown">
                <div class="btn-group">
                    <a type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                        <img src="{{ url('assets/images/photos/loggeduser.png') }}" alt="" />
                        {{ Auth::user()->name ?? '0' }}
                        <span class="caret"></span>
                    </a>
                 

                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right"  data-popper-placement="bottom-start">
                        <!-- <li><a class="dropdown-item" href="profile.html"><i class="fa fa-user-check"></i>  My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-user-cog"></i> Account Settings</a></li>-->
                        <li><a class="dropdown-item" href="{{ route('admin-user-password') }}"><i class="fa fa-user"></i> {{_('Change Password')}}</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-door-open"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>

            </ul>

            
        </div><!-- header-right -->
    
    </div><!-- headerbar -->