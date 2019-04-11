@extends('layouts.app')

@section('content')
    @foreach($discussions as $discussion)
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img height="20px" width="20px" src="{{gravatar($discussion->author->email)}}" alt="">
                    <strong class="ml-2">{{$discussion->author->name}}</strong>
                </div>
                <div>
                    <a href="" class="btn btn-success btn-sm">View</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! $discussion->content !!}
        </div>
    </div>
    @endforeach
    {{$discussions->links()}}
@endsection

