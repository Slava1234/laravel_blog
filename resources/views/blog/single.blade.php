@extends('main')

<?php $title = htmlspecialchars($post->title); ?>
@section('title', "| $title")

@section('content')
	<div class="row col-md-8 col-md-offset-2">
		<h1>{{ $post->title }}</h1>
		<p>{!! $post->body !!}</p>
		<hr>
		<p>Категория:
			<a href="{{ route('category.index', $post->category->name ) }}">
				{{ $post->category->name }}
			</a>
		</p>
	</div>

	
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2 form-spacing-top">
			<div class="col-md-12 post-comment-message">
				<div class="alert alert-success">Спасибо! Ваш комментарий отправлен на модерацию.</div>
				<div class="alert alert-danger">Ошибка...</div>
			</div>
			{{ Form::open(['route' => 'post.comment', 'method' => 'POST']) }}
				<input type="text" hidden name="post_id" value="{{ $post->id }}">
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Имя:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-12">
						{{ Form::label('comment', 'Комментарий:') }}
						{{ Form::textarea('comment', null, ['rows' => 5,'class' => 'form-control']) }}
						{{ Form::submit('Добавить комментарий', ['id' => 'create_comment','class' => 'btn btn-success btn-block btn-h1-spacing']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p class="comments-title">
				{{ $post->comments()->where('approved', 1)->count() }}
				Комментариев
			</p>
			@foreach($post->comments as $comment)
				@if($comment->approved == 1)
					<div class="comment">
						<div class="autor-info">
							<div class="author-name">
								<h4>{{ $comment->name }}</h4>
								<p class="author-time">
									{{ date('F nS, Y - G:i', strtotime($comment->created_at)) }}
								</p>
							</div>
						</div>
						<div class="comment-content">
							{{ $comment->comment }}
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
@endsection









   