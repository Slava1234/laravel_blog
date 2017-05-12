@extends('main')

@section('title', 'Edit blog post')

@section('content')
    <div class="row">
        <!-- Form binding -->
        <!-- !!!! means we are not echoing out we just need to execute some code -->
        <!--1:param is Model object, 2: param is all the options you want-->

        {!! Form::model($post, ['route' => ['posts.update', $post->id], "method" => "PUT"]) !!}
            <div class="col-md-8">
                {{ Form::label("title", "Название:") }}
                {{ Form::text('title', null, ["class" => "form-control input-lg"]) }}

                {{ Form::label("slug", "URL Слог:", ["class" => 'form-spacing-top']) }}
                {{ Form::text('slug', null, ["class" => "form-control input-lg"]) }}

                {{ Form::label('category_id', 'Категория: ', ['class' => 'btn-h1-spacing']) }}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label("body", "Текст:", ["class" => "form-spacing-top"]) }}
                {{ Form::textarea('body', null, ["class" => "form-control"]) }}
            </div>

            <div class="col-md-4">
                <div class="well">
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
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Отмена</a>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::submit('Сохранить', ["class" => "btn btn-success btn-block"]) }}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ url('public/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: 'image link lists table textcolor media imagetools colorpicker emoticons wordcount'

        });
    </script>
@endsection
