@extends('templates.layout')

@section('title')
    Instageek - User List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <b>{{ $user->username }}</b>
                        </div>
                        <div class="card-container text-center">
                            <img src="{{ $user->profile_picture }}" class="img-responsive" alt="{{ $user->username }}">
                        </div>
                        <div class="card-footer text-center">
                            FOLLOWERS: <b>{{ $user->followers()->count() }}</b> | FOLLOWING: <b>{{ $user->followees()->count() }}</b>
                            @auth
                                <hr>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection