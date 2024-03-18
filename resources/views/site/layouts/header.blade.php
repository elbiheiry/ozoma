<header>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{route('site.index')}}" class="logo" alt="logo">
                   <img src="{{ surl('images/logo.png') }}" />
                </a>
                <ul class="links">
                    @if (auth()->guard('site')->guest())
                        <li>
                            <a href="#login" class="link" data-toggle="modal" data-target="#login">
                                <i class="fa fa-lock"></i>
                                <span>     تـسـجـيـل دخـول</span>
                           
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.register') }}" class="link">
                                <i class="fa fa-user"></i>
                                <span>     إنشاء حساب جديد  </span>
                           
                              
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('site.profile.notifications')}}" class="icon_link">
                                <i class="far fa-bell"></i>
                            </a>
                        </li>
                        <li>
                            <button href="" class="profile_btn icon_link dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{ surl('images/user.jpg') }}" />
                            </button>
                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('site.profile.index') }}" class="dropdown-item">
                                    الملف الشخصى
                                </a>

                                <a href="{{ route('site.profile.contacts') }}" class="dropdown-item">
                                    جهات الاتصال
                                </a>

                                <a href="{{ route('site.profile.settings') }}" class="dropdown-item">
                                    إعدادات الحساب
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="#" onclick="$('#logout-form').submit()" class="link">
                                 <i class="fa fa-power-off"></i>
                                <span> 
                                
                                  تسجيل خروج
                                
                                
                                </span>                          
                            </a>
                        </li>
                    @endif
                    @if (request()->routeIs('site.index'))
                        <li>
                            <a href="{{route('site.invitation1')}}" class="link"> إبـــدا دعواتك </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</header>
<form id="logout-form" action="{{ route('site.logout') }}" method="post">
    @csrf
</form>
