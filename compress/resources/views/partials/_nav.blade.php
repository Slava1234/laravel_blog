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
            <a class="navbar-brand" href="{{ route('index') }}">
                Expert.com
            </a>
        </div>

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
    </div><!-- /.container-fluid -->
</nav>
