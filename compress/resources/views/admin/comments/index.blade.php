@extends('main')

@section('title', 'Новые комментарии')

@section('content')
    <div class="container">
      <h2>Новые комментарии</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Пользователь</th>
            <th>E-mail пользователя</th>
            <th>Название поста</th>
            <th>Комментарий</th>
            <th>Дата добавления</th>
            <th>Действие</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($newComments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td><a href="{{ url('./blog/'.$comment->post->slug) }}">{{ $comment->post->title }}</a></td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                        {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                            <input class="btn btn-danger btn-xs" type="submit" value="Удалить">
                        {{ Form::close() }}

                        {{ Form::open(['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
                            <input type="submit" class="btn btn-success btn-xs" value="Утвердить">
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>
</div>
@endsection
