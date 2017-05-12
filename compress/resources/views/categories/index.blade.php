@extends('main')

@section('title', "| All categories")

@section('content')
	<div class="row">


		<div class="col-md-8">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Список категорий</h4></div>
			  <div class="panel-body">
				  <table class="table">
						  <thead>
							  <tr>
								  <th>id</th>
								  <th>Название</th>
							  </tr>
						  </thead>
						  <tbody>
							  @foreach($categories as $category)
								  <tr>
									  <th>{{ $category->id }}</th>
									  <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
								  </tr>
							  @endforeach
						  </tbody>
				  </table>

			  </div>
			</div>
		</div>


		<div class="col-md-4">
			<div class="well">
				<!-- this form is automatically assum it post request -->
				<form class="form-horizontal" role="form" method="POST" action="{{ route('categories.store') }}">
                        {{ csrf_field() }}

					<h4>Создать новую категорию</h4>
					<label for="name">Название категории:</label>
					<input type="text" name="name" class="form-control">
					{{ Form::submit('Создать', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
				</form>
			</div>
		</div>
	</div>

@endsection
