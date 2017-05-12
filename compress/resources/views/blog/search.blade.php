@extends('main')

@section('title', "| Поиск")

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h3>Результаты поиска</h3>
		</div>
	</div>

	<div class="row">
        <div class="col-md-8">
			@if(count($searchResult) > 0)
	            @foreach($searchResult as $post)
	                <div class="post">
	                    <a class="post-title" href="{{ url('./blog/'.$post->slug) }}">
	                        <h3 >{{ $post->title }}</h3>
	                    </a>
	                    <p>{{ substr(strip_tags($post->body), 0,300) }} {{ strlen(strip_tags($post->body)) > 300? "...": "" }}</p>
	                </div>
	                <hr>
	            @endforeach
			@else
				<h4>По вашему запросу ничего не найдено</h4>
			@endif
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h3 class="category-h3">Категории</h3>
            <ul class="list-group">
                  @foreach($catpostsnum as $category)
                    <a href="{{ route('category.index', $category->name ) }}" class="category-links-list">
                      <li class="list-group-item justify-content-between category-li-list">
                        {{ $category->name }}
                        <span class="badge badge-default badge-pill">
                            {{ $category->posts->count() }}
                        </span>
                      </li>
                    </a>
                  @endforeach
            </ul>
        </div>
    </div>

    <div class="text-center">
        {!! $searchResult->appends(Request::only('q'))->links() !!}

    </div>

@endsection
