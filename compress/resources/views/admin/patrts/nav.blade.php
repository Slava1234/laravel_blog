<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">
            @if(Auth::check())
                {{ Auth::user()->name }}
            @else
                {{ "Laravel blog" }}
            @endif
            </a>
        </div>



        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class={{ Request::is('/')? "active": "" }}><a href="{{ route('index') }}">Home</a></li>
                <li class={{ Request::is('blog')? "active": "" }}><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class={{ Request::is('about')? "active": "" }}><a href="{{ route('about') }}">About</a></li>
                <li class={{ Request::is('contact')? "active": "" }}><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <!--Поиск-->
            {!! Form::open(['route' => 'blog.search' , 'method' => 'get']) !!}
                <div class="col-lg-4 margin-top-15">
                    <div class="input-group">
                      <input type="text" @if(isset($_GET['q']))value="{{$_GET['q']}}" @endif name="q" class="form-control" placeholder="Поиск...">
                      <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="Найти">
                      </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            {!! Form::close() !!}

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::check()? "MyAccount" : "Menu" }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(!Auth::check())
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ url('posts') }}">Posts</a></li>
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('out') }}">Logout</a></li>
                        @endif


                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
