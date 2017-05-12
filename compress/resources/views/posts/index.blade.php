@extends('main')

@section('title', 'All posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3>Список всех постов</h3>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="create-post-btn btn btn-md btn-block btn-success">Создать пост</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 admin-count-comments">
            <a href="{{ route('comments.index') }}" class="btn btn-primary btn-sm">
                Новых комментариев:
                <span class="badge badge-default badge-pill">
                    {{ $notApprovedComments }}
                </span>
            </a>
        </div>

        <!--Поиск-->
        <div class="admin-search-form">
            {!! Form::open(['route' => 'admin.post.search' , 'method' => 'get']) !!}
                <div class="col-lg-4">
                    <div class="input-group">
                      <input type="text" @if(isset($_GET['q']))value="{{$_GET['q']}}" @endif name="q" class="form-control" placeholder="Поиск...">
                      <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="Найти">
                      </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            {!! Form::close() !!}
        </div>



    </div>



    <div class="row">
        <div class="col-md-12 form-spacing-top">
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>Название</th>
                    <th>Текст</th>
                    <th>Дата создания</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body))>50 ? '...':'' }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td class="width-100">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default admin-table-buttons">Посмотреть</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-default margin-top-5 admin-table-buttons">Редактировать</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Make pagination links -->
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection
