@extends('main')

@section('title', "| All categories")

@section('content')
	<div class="row">

		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Категория: {{ $category->name }}</h4></div>
			  <div class="panel-body">
				  <div class="col-md-8 col-md-offset-2">
					  {!! Form::open(['route' => ['categories.update', $category->id], "method" => "PUT"]) !!}
						  {{ Form::label('name', 'Переименовать эту категорию: ') }}
						  {{ Form::text('name', null, ["class" => "form-control"]) }}
						  {{ Form::submit('Переименовать', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
					  {!! Form::close() !!}
					  <hr>
				  		{!! Form::open(['route' => ['categories.destroy', $category->id], "method" => "DELETE"]) !!}
				  			<h4>Удалить эту категорию</h4>
				  			<h5>Вместе с категорией удалятся все посты в этой категрии</h5>
				  			{{ Form::submit('Удалить', ['class' => 'btn btn-danger btn-block btn-h1-spacing']) }}
				  		{!! Form::close() !!}
				  		<hr>
				  		<a href="{{ route('categories.index') }}" class="btn btn-default btn-block">Отмена</a>
					</div>
			  </div>
			</div>
		</div>




	</div>

@endsection
