<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                    <a class="navbar-brand" href="home.htm">Training HTLM, CSS dan JS </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li>{!! link_to(route('root'), "Home") !!}</li>
            <li>{!! link_to(route('profile'), "Profile") !!}</li>
            <li>{!! link_to(route('articles.index'), "Article") !!}</li>
            </ul>
        </div>  
    </nav>