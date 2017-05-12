@extends('main')

@section('title', 'Поиск')

@section('content')

    <!--Поиск-->
    {!! Form::open(['route' => 'admin.post.search' , 'method' => 'get']) !!}
        <div class="col-lg-4 margin-top-15">
            <div class="input-group">
              <input type="text" @if(isset($_GET['q']))value="{{$_GET['q']}}" @endif name="q" class="form-control" placeholder="Поиск...">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-default" value="Найти">
              </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    {!! Form::close() !!}

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
                    @foreach($searchResult as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body))>50 ? '...':'' }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-default">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
