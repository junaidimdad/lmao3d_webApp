@extends('layouts\LandingLayout')

  
  @section('header')

    @include('thread.partials.navForum')

  @endsection

  @section('all-title-box')

    @include('thread.partials.headerPageArea')

  @endsection

@section('category-client')

    <div class="col-md-4" >
        <div style="height:200px; width:200px; margin-left:27%;" >
            <img src="/clients/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px;" >
            <a class="btn btn-xs" data-toggle="modal" href="#uploadpic" style="color:blue;"><span class="fa fa-camera"></span></a>
            <div>
                <h6>{{$user->name}}</h6>
            </div>
            <div class="modal fade" id="uploadpic">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                            </button>
                            <h4 class="modal-title text-center"><span class="fa fa-camera"></span></h4>
                        </div>
                        <div class="modal-body">
                            <div class="comment-form">
                                <form enctype="multipart/form-data" action="/ClientProfile" method="POST">
                                    {{ csrf_field() }}
                                    <label for="file">
                                    <input type="file" id="file" name="avatar" multiple="" data-original-title="upload photos">
                                    </label>
                                    <hr>
                                    <label for="uploadfile">
                                    <button type="submit" name="upload" id="uploadfile" class="btn btn-primary" style="margin:left:80%;"><span class="fa fa-upload"></span> Upload</button>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>
    </div>
@endsection

@section('content-client-thread')
<div class="container">
    <div class="col-md-8">
        <h6>Personal Details</h6>
        <b>Email:</b> <span>{{$user->email}}</span>
        <hr>
        <h6>Activivty</h6>
        <a href="{{route('client_profile', auth()->user())}}">View Resent Activivty<a>
    </div>
</div>
<hr>
@endsection