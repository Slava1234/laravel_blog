@include('partials._head')


<body>
@include('partials._nav')

<div class="container">
    @include('partials._messages')
    @yield('content')
    @include('partials._footer')
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ url('js/scripts.js') }}"></script>

@yield('scripts')

</body>
</html>
