@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row center-block">
        <div class="col-md-12">
			<div class="row">
            @for ( $i = 0 ; $i < $user->count() ; $i++ )
				<div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">{{ $user[$i]->username }}</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{ $user[$i]->profile_picture }}" class="img-circle img-responsive center-block" alt="{{ $user[$i]->username }}">
                        </div>
                        <div class="panel-footer text-center">{{ $user[$i]->name }}</div>
                    </div>
				</div>
            @endfor
			</div>
        </div>
    </div>
    <div class="row">
        <hr>
        <div class="col-md-12">
			<div class="row">
                @for ( $i = 0 ; $i < $post->count() ; $i++ )
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="{{ $post[$i]->photo }}" class="img-responsive" alt="{{ $post[$i]->caption }}">
                            </div>
                        </div>
                    </div>
                @endfor
			</div>
		</div>
    </div>
</div>
@endsection
