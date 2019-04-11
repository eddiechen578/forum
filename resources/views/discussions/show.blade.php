@extends('layouts.app')

@section('content')
   <div class="card">
           @include('partials.discussion-header')
            <div class="card-body">
                <div class="text-center">
                    <strong>
                        {{  $discussion->title }}
                    </strong>
                </div>

                <hr>

                {!! $discussion->content !!}
            </div>
        </div>

   @foreach($discussion->replies()->paginate(3) as $reply)
        <div class="card my-4">
            <div class="card-header">
                <div class="d-flex justfy-content-between">
                    <div>
                        <img width="20px" height="20px" style="border-radius: 50%" src="{{gravatar($reply->owner->email)}}" alt="">
                        <span>{{$reply->owner->name}}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!!$reply->content!!}
            </div>
        </div>
   @endforeach
    {{$discussion->replies()->paginate(3)->links()}}
    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
          @auth
            <form action="{{route('replies.store', $discussion->slug)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="content" id="content">
                <trix-editor input="content"></trix-editor>
                <button type="submit" class="btn btn-sm my-2 btn-success">
                    Create Reply
                </button>
            </form>
          @else
                <a href="{{route('login')}}" class="btn btn-info">Sign in to add a reply</a>
          @endauth
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.js"></script>
@endsection