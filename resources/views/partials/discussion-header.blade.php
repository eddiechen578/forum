<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img height="20px" width="20px" src="{{gravatar($discussion->author->email)}}" alt="">
            <strong class="ml-2">{{$discussion->author->name}}</strong>
        </div>
        <div>
            <a href="{{route('discussion.show', $discussion->slug)}}" class="btn btn-success btn-sm">View</a>
        </div>
    </div>
</div>