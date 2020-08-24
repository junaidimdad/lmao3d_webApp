@extends('layouts\LandingLayout')


  @section('header')

    @include('thread.partials.navForum')

  @endsection

  @section('all-title-box')

    @include('thread.partials.headerPageArea')
    
  @endsection

@section('single-thread-content')
<div class="container">
  <div class="row">
      <div class="col-md-3">
          <h6><span class="fa fa-list-alt"></span> Catogries</h6>
      </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      @include('thread.partials.catogries')
    </div>
  <div class="col-md-9">
    <div class="row">
      <div class="content-wrap well">
          <h4>{{$thread->subject}}</h4>
          <div class="thread-details">
            {!! \Michelf\Markdown::defaultTransform($thread->thread)  !!}
          </div><br>
         
          @if(auth()->user()->id == $thread->client_id)
          <div class="actions">

              <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-xs"><span class="fa fa-edit" style="color:blue;"></span></a>

              {{--//delete form--}}
              <form action="{{route('thread.destroy',$thread->id)}}" method="POST" class="inline-it">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class="btn btn-xs" type="submit"><span class="fa fa-trash"  style="color:red;"></span></button>
              </form>
          </div>
          <br>
          @endif
          <a class="btn btn-xs" data-toggle="modal" href="#{{$thread->id}}"><b><span class="fa fa-comment"></span> Comment</b></a>
          <div class="modal fade" id="{{$thread->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title text-center"><span class="fa fa-comment"></span> Comment</h4>
                </div>
                <div class="modal-body">
                  <div class="comment-form">
                    <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
                      {{csrf_field()}}

                      <div class="form-group">
                        <textarea type="text" class="form-control" name="body" id=""
                        placeholder="Comment..." rows="5" cols="5" style="resize:none;"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" style="margin-left:93%"><span class="fa fa-paper-plane"></span></button>
                    </form>
                  </div>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal --> 
      </div>
      <hr>
      <br>   
          @foreach($thread->comments as $comment)
            <div class="comment-list well well-lg">
              <lead><span class="fa fa-user"></span> {{$comment->user()->name?? 'Anonymous'}}</lead><span style="margin-left:72%;">{{$comment->created_at->diffForHumans()}}</span>
              <hr>
              <h6>{{$comment->body}}</h6>
              @if(!empty($thread->solution))
                @if($thread->solution==$comment->id)
                  <button class="btn btn-success pull-down pull-right" style="border-radius:50px;">Solution</button>
                @endif
              @else
              @if(auth()->check())
                @if(auth()->user()->id==$thread->client_id)
                  <div  class="btn pull-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)" style="border-radius:50px; border:1px solid black;">solution</div>
                @endif
              @endif
              @endif
              @if(auth()->user()->id == $comment->client_id)
              <div class="actions">    
                <button class="btn btn-xs" onclick="likeIt('{{$comment->id}}', this)"><span class="fa fa-heart"></span></button>
                <a class="btn btn-xs" data-toggle="modal" href="#{{$comment->id}}" style="color:blue;"><span class="fa fa-edit"></span></a>
                <div class="modal fade" id="{{$comment->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                                <h4 class="modal-title text-center"><span class="fa fa-edit"></span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="comment-form">
                                    <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" name="body" id=""
                                            rows="5" cols="5" style="resize:none;">{{$comment->body}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="margin-left:93%;"><span class="fa fa-paper-plane"></span></button>
                                    </form>
                                  </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{--//delete form--}}
                <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-xs" type="submit" style="color:red;"><span class="fa fa-trash"></span></button>
                </form>
              </div>
              <hr>
              @endif

       
              <a class="btn btn-xs" onclick="toggleReply('{{$comment->id}}')"><span class="fa fa-reply"></span> Reply</a><br>
              <div class="reply-form-{{$comment->id}} hidden">
                <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
                  {{csrf_field()}}

                  <div class="form-group">
                    <textarea type="text" class="form-control" name="body" id=""
                    placeholder="Reply..." rows="5" cols="5" style="resize:none;"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-left:95%"><span class="fa fa-paper-plane"></span></button>
                </form>
              </div>
            </div>

            @foreach($comment->comments as $reply)
              <div class="small well text-info" style="margin-left:20px;">
                <lead><span class="fa fa-users"></span> {{$reply->user->name?? 'Anonymous'}}</lead><span style="margin-left:70%;">{{$reply->created_at->diffForHumans()}}</span>
                <hr>
                <p>{{$reply->body}}</p>
                @if(auth()->user()->id == $reply->client_id)
                <div class="actions">
                  <a class="btn btn-xs" data-toggle="modal" href="#{{$reply->id}}" style="color:black;"><span class="fa fa-edit"></span></a>
                  <div class="modal fade" id="{{$reply->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h4 class="modal-title text-center"><span class="fa fa-edit"></span></h4>
                        </div>
                        <div class="modal-body">
                          <div class="reply-form">
                            <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                              {{csrf_field()}}
                              {{method_field('put')}}
                              <div class="form-group">
                                <textarea type="text" class="form-control" name="body" id=""
                                rows="5" cols="5" style="resize:none;">{{$reply->body}}</textarea>
                              </div>
                              <button type="submit" class="btn btn-primary" style="margin-left:93%"><span class="fa fa-paper-plane"></span></button>
                            </form>
                          </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                  {{--//delete form--}}
                  <form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-xs" type="submit" style="color:red;"><span class="fa fa-trash"></span></button>
                  </form>
                </div>
                @endif
              </div>
            @endforeach
            <hr>
            <br>
          @endforeach

      </div><br><br>
    </div>
    </div>
  </div>
</div>
<hr>
@endsection

@section('js')
  <script>
    function toggleReply(commentId){
      $('.reply-form-'+commentId).toggleClass('hidden');
    }

    function markAsSolution(threadId, solutionId,elem) {
      var csrfToken='{{csrf_token()}}';
      $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
          $(elem).text('Solution');
      });
    }

    function likeIt(commentId, elem){
      var csrfToken='{{csrf_token()}}';
      $.post('{{route('likeIt')}}', {commentId: commentId ,_token:csrfToken}, function (data) {
          console.log(data);
         
      });
    }
  
  </script>
@endsection