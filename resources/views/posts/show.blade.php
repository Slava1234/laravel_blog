@extends('main')

@section('title', 'View post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->body !!}</p>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Слог:</dt>
                    <dd><a href="{{ url('blog').'/'.$post->slug }}">{{ $post->slug }}</a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Категория:</dt>
                    <dd>{{ $post->category->name }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Создан:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Обновлен:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block btn-sm">Редактировать</a>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(["route" => ["posts.destroy", $post->id], "method" => "DELETE"]) !!}
                            {!! Form::submit("Удалить", ["class" => "btn btn-danger btn-block btn-sm"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', '<< Назад', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
