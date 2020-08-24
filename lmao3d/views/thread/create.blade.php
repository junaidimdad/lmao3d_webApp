@extends('layouts\LandingLayout')

  @section('header')
 
    @include('thread.partials.navForum')

  @endsection

  @section('all-title-box')

    @include('thread.partials.headerPageArea')

  @endsection

@section('thread-form-content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h6><span class="fa fa-list-alt"></span> Catogries</h6>
        </div>
        <div class="col-md-9">
            <div class="row">
            <div class="col-md-4"><h6 class="main-content-heading"><span class="fa fa-plus"></span> Create New Discussion</h6></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('thread.partials.catogries')
        </div>
        <div class="col-md-9">
        <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class=" well">
            <form class="form-vertical" action="{{url('thread')}}" method="POST" role="form"
                  id="create-thread-form">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tags[]" multiple id="tag" >
                        {{-- todo add from db--}}
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Subject..."
                           value="{{old('subject')}}">
                </div>

                <div class="form-group">
                    <label for="thread">Thread</label>
                    <textarea class="form-control" name="thread" id="" rows="7" cols="7" style="resize:none;" placeholder="Discussion..."
                    > {{old('thread')}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection

@section('js-create')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

    <script>

        $(function () {
            $('#tag').selectize();
        })
    </script>
@endsection