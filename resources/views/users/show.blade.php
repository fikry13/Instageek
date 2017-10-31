@extends('templates.layout')

@section('title')
    Instageek - {{ $user->username }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <img alt="{{ $user->username }}" width="160" heigth="160" class="text-center center-block img-responsive" src="{{ asset($user->profile_picture) }}">
            </div>
            <div class="col-md-6">
                <h3><b>{{ $user->username }}</b></h3>
                @if($user->id == auth()->id())
                    <a href="#" class="btn btn-primary btn-flat">Edit Profile</a> <a href="{{ route('logout') }}" class="btn btn-danger btn-flat"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    @auth
                        @if(auth()->user()->followees->contains($user))
                            <form action={{ route('follows.destroy', ['user_id' => auth()->id(), 'follow' => $user->id]) }} method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="followee_id" value={{ $user->id }} class="form-control">
                                <button type="submit" class="btn btn-default btn-flat">
                                    Unfollow
                                </button>
                            </form>
                        @else
                            <form action={{ route('follows.store', auth()->id()) }} method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="followee_id" value={{ $user->id }} class="form-control">
                                <button type="submit" class="btn btn-primary btn-flat">
                                    Follow
                                </button>
                            </form>
                        @endif
                    @endauth
                @endif
                <br>
                FOLLOWERS: <b>{{ $user->followers()->count() }}</b> | FOLLOWING: <b>{{ $user->followees()->count() }}</b>
                <br><br>
                <b>{{ $user->name }}</b> {{ $user->bio }}
                <br>
                <a href="http://{{ $user->website }}" target="_blank">{{ $user->website }}</a>
            </div>
        </div>
        <div class="user-post">
            @foreach($user->posts as $post)
                <div class="col-md-4">
                    <img alt="{{ $post->caption }}" class="center-block img-responsive" src="{{ asset($post->photo) }}">
                </div>
            @endforeach
        </div>
    </div>
@endsection