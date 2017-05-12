@extends('main')


@section('title', 'Create new post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Создание нового поста</h3>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                {{ Form::label('slug', 'URL Слог: ') }}
                {{ Form::text('slug', null, ["class" => "form-control", 'required'=>'', 'minlength' => '5', 'maxlength' => '255']) }}

                {{ Form::label('category_id', 'Категория: ', ['class' => 'btn-h1-spacing']) }}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('feautred_image', 'Загрузить изображение', ['class' => 'btn-h1-spacing']) }}
                {{ Form::file('feautred_image') }}

                <label class="btn-h1-spacing" for="title">Название: </label>
                <input type="text" name="title" id="title" class="form-control">

                <label class="btn-h1-spacing" for="body">Текст: </label>
                <textarea name="body" rows="10" id="body" class="form-control"></textarea>

                <input type="submit" id="submit_create_post_form" value="Создать пост" style="margin-top: 20px" class="btn btn-success btn-lg btn-block">
                <input name="image" type="file" id="upload" class="hidden" onchange="">

                {{ csrf_field() }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ url('public/tinymce/tinymce.min.js') }}"></script>
    <script>
      tinymce.init({
        selector: "textarea",
        theme: "modern",
        paste_data_images: true,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        file_picker_callback: function(callback, value, meta) {
          if (meta.filetype == 'image') {
            $('#upload').trigger('click');
            $('#upload').on('change', function() {
              var file = this.files[0];
              var reader = new FileReader();
              reader.onload = function(e) {
                callback(e.target.result, {
                  alt: ''
                });
              };
              reader.readAsDataURL(file);
            });
          }
        },
        templates: [{
          title: 'Test template 1',
          content: 'Test 1'
        }, {
          title: 'Test template 2',
          content: 'Test 2'
        }]
      });
    </script>
@endsection
