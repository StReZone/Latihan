<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                    <a class="navbar-brand" href="home.htm">Training HTLM, CSS dan JS </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to(route('root'), "Home") !!}</li>
                <li>{!! link_to(route('profile'), "Profile") !!}</li>
                <li>{!! link_to(route('articles.index'), "Article") !!}</li>
                <li>{!! link_to(route('tablearticles.index'), "Table Article") !!}</li>
                @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
            </ul>
        </div>  
    </nav>