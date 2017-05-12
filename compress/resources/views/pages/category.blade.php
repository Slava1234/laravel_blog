@extends('main')

@section('title', 'Contacts')

@section('content')
    <div class="row">
        <h2>{{ $category_name }}</h2>
        <div class="col-md-8">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="post">
                        <a class="post-title" href="{{ url('./blog/'.$post->slug) }}">
                            <h3 >{{ $post->title }}</h3>
                        </a>
                        <p>{{ substr(strip_tags($post->body), 0,300) }} {{ strlen(strip_tags($post->body)) > 300? "...": "" }}</p>
                    </div>
                    <hr>
                @endforeach
            @else
                <h4>В этой категории пока нет записей</h4>
            @endif

        </div>
        <div class="col-md-3 col-md-offset-1">
            <h3 class="category-h3">Категории</h3>
            <ul class="list-group">
                  @foreach($catpostsnum as $category)
                    <a href="{{ route('category.index', $category->name ) }}" class="category-links-list">
                        <!-- Выделяем выбранную категорию как category-selected-active -->
                        @if($category_name == $category->name)
                          <li class="category-selected-active list-group-item justify-content-between category-li-list">
                            {{ $category->name }}
                            <span class="badge badge-default badge-pill">
                                {{ $category->posts->count() }}
                            </span>
                          </li>
                        @else
                            <li class="list-group-item justify-content-between category-li-list">
                              {{ $category->name }}
                              <span class="badge badge-default badge-pill">
                                  {{ $category->posts->count() }}
                              </span>
                            </li>
                        @endif
                    </a>
                  @endforeach
            </ul>



        </div>
    </div>
    <div class="text-center">
        {!! $posts->links() !!}
    </div>
@endsection
