@extends('layouts.app')

@section('content')
<div class="container">
    @for ( $i = 0 ; $i < $post->count() ; $i++ )
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a href="{{ url('/p/' . $post[$i]->id) }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">{{ $post[$i]->user->username }}</h3>
                    </div>
					<div class="panel-body">
                        <img alt="{{ $post[$i]->caption }}" class="img-responsive" src="{{ $post[$i]->photo }}">
                    </div>
                    <div class="panel-footer text-center">
                        {{ $post[$i]->caption }}
                    </div>
				</div>
                </a>
			</div>
		</div>
    @endfor
</div>
@endsection

{{--  @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
