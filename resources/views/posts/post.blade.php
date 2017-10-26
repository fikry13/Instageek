@extends('templates.layout')

@section('title')
    Instageek - post by {{ $post->user->username }}
@endsection

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{ $post->user->username }}</h3>
                </div>
				<div class="panel-body">
                    <img alt="{{ $post->caption }}" class="center-block img-responsive" src="{{ $post->photo }}">
                </div>
                <div class="panel-footer text-center">
                    {{ $post->caption }}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection