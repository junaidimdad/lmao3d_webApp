@extends('layouts\LandingLayout')

  
  @section('header')

    @include('thread.partials.navForum')

  @endsection

  @section('all-title-box')

    @include('thread.partials.headerPageArea')

  @endsection



@section('threads')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h6><span class="fa fa-list-alt"></span> Catogries</h6>
        </div>
        <div class="col-md-9">
            <div class="row">
            <div class="col-md-4"><h6 class="main-content-heading"><span class='fa fa-comments-o'></span> All Discussions</h6></div>
            <div class="col-md-offset-6 col-md-2">
                <a href="{{route('thread.create')}}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Start Discussion</a>
            </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-3">
            @include('thread.partials.catogries')
        </div>
        <div class="col-md-9">
        <div class="list-group">
        @foreach($threads as $thread)
        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="{{route('client_profile',$thread->user->name)}}">
                    <img src="/clients/avatars/{{$thread->user->avatar}}" style="width:32px; height:32px;  top:17px; left:10px;  border-radius:50%"> <span></span>
                </a><span class="pull-right" style="font-size:12px;">{{$thread->created_at->diffForHumans()}}</span>
            </div>
            <div class="panel-body">
                <h3 class="panel-title"><a href="{{route('thread.show',$thread->subject)}}"><b>{{$thread->subject}}</b></a></h3>
                <hr>
                <p>
                    {{\Illuminate\Support\Str::limit($thread->thread,100) }}
                </p>
            </div>
        </div>
        @endforeach
        </div>
        </div>
    </div>
</div>
@endsection
