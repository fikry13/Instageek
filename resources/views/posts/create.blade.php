@extends('templates.layout')

@section('title')
    Instageek - New Post
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>New Post</h3>
                        <form class="form-horizontal" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="uploadPhoto" class="col-sm-2 control-label">Photo</label>

                                    <div class="col-sm-10">
                                        <input type="file" name="photo" id="exampleInputFile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCaption" class="col-sm-2 control-label">Caption</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="caption" id="inputCaptiom" placeholder="Caption"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-info btn-upload">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection