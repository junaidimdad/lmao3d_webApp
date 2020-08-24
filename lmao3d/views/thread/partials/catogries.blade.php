<ul class="list-group">
                <a href="{{route('thread.index')}}" class="list-group-item"> All Discussions</a>
                @foreach($tags as $tag)
                  <a href="{{route('thread.index',['tags'=>$tag->id])}}" class="list-group-item">
                      <span class="badge">{{count($tag->threads)}}</span>
                      {{$tag->name}}
                  </a>
                @endforeach
                </a>
            </ul>