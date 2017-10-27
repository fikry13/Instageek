@extends('templates.layout')

@section('title')
    Instageek
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#register').show();
            $('#login').hide();
            $(this).text('Login');
            $('#account-info').text('Got an account? ');
            $('#toggle-login').click(function () {
                if ($('#register').is(':visible')){
                    $('#register').hide();
                    $('#login').show();
                    $(this).text('Register');
                    $('#account-info').text('Don\'t have an account? ');
                }
                else {
                    $('#register').show();
                    $('#login').hide();
                    $(this).text('Login');
                    $('#account-info').text('Got an account? ');
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        @guest
            <div class="login-panel">
                <div id="register"  class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                    <h1><i class="fa fa-camera-retro" aria-hidden="true"></i> Insta<b>geek</b></h1>
                                    <p><b>Create an account to post pictures and connect with friends</b></p>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Fullname" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="login" class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                    <h1><i class="fa fa-camera-retro" aria-hidden="true"></i> Insta<b>geek</b></h1>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <input id="username" type="username" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox text-center">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Login
                                            </button>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                    <span id="account-info">Got an account?</span><a href="#" id="toggle-login">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
        @auth
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <a href="#" class="btn btn-primary btn-block btn-lg">
                        <i class="fa fa-plus"></i> New Post
                    </a>
                </div>
            </div>
            <div class="row">
                @for ( $i = 0 ; $i < $post->count() ; $i++ )
                    <div class="col-md-6 col-md-offset-3">
                        <div class="card">
                            <a href="{{ route('userProfile', $post[$i]->user->id) }}">
                            <div class="card-header">
                                <div class="float-left">
                                    <img src={{ $post[$i]->user->profile_picture }} width="32" heigth="32" class="img-circle" alt="User Image"> <b>{{ $post[$i]->user->username }}</b>
                                </div>
                            </div>
                            </a>
                            <div class="card-container">
                                <img src="{{ $post[$i]->photo }}" class="img-responsive" alt="{{ $post[$i]->caption }}">
                            </div>
                            <div class="card-footer">
                                @if ($post[$i]->likes->contains(auth()->user()))
                                    <form action={{ url('/posts/'.$post[$i]->id.'/likes/'.$post[$i]->id) }} method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="post_id" value={{ $post[$i]->id }} class="form-control">
                                        <button type="submit" class="btn btn-default btn-flat btn-block bg-pink">
                                            <i class="fa fa-heart"></i> Dislike
                                        </button>
                                    </form>
                                @else
                                    <form action={{ url('/posts/'.$post[$i]->id.'/likes') }} method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="post_id" value={{ $post[$i]->id }} class="form-control">
                                        <button type="submit" class="btn btn-default btn-flat btn-block bg-pink">
                                            <i class="fa fa-heart-o"></i> Like
                                        </button>
                                    </form>
                                @endif
                                <br>
                                <i class="fa fa-heart-o"></i>
                                <b>
                                    {{ $post[$i]->likes->implode('username',', ') }}
                                </b>
                                <br>
                                <hr>
                                @foreach ($post[$i]->comments as $comment)
                                    <b>{{ $comment->user->username }}</b> {{ $comment->comment }}
                                    <br>
                                @endforeach
                                <hr>
                                <form action={{ route('comments.store', ['post_id' => $post[$i]->id]) }} method="post">
                                    {{ csrf_field() }}
                                    <div class="input-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <input type="hidden" name="post_id" value={{ $post[$i]->id }} class="form-control">
                                        <input type="hidden" name="user_id" value={{ auth()->id() }} class="form-control">
                                        <input type="text" name="comment" placeholder="Type Your Comment ..." value="{{ old('comment') }}" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default btn-flat">
                                                <i class="fa fa-comment-o"></i>
                                            </button>
                                        </span>
                                    </div>
                                    @if ($errors->has('comment'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        @endauth
    </div>
@endsection