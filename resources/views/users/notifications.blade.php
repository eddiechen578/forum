@extends('layouts.app')

@section('content')
    <div class="card">
       <div class="card-header">
           Notifications
       </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($notifications as $notification)
                    <li class="list-group-item">
                        @if($notification->type === 'App\Notifications\NewReplyAdded' )
                            A new reply was added to your discussion
                            <strong>
                                {{$notification->data['discussion']['title']}}
                            </strong>
                            <a href="{{route('discussion.show', $notification->data['discussion']['slug'])}}" class="float-right btn btn-sm btn-info">
                                View discussion
                            </a>
                            <small class="float-right mr-3">
                                    {{$notification->created_at->diffForHumans()}}
                            </small>
                        @endif
                        @if($notification->type === 'App\Notifications\ReplyMarkedAsBestReply')
                            Your reply to the discussion
                            <strong>
                                {{$notification->data['discussion']['title']}}
                            </strong>
                            was marked as best reply
                                <a href="{{route('discussion.show', $notification->data['discussion']['slug'])}}" class="float-right btn btn-sm btn-info">
                                    View discussion
                                </a>
                                <small class="float-right mr-3">
                                    {{$notification->created_at->diffForHumans()}}
                                </small>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="d-flex">
            <div class="ml-auto">
                {{$notifications->links()}}
            </div>
        </div>
    </div>

@endsection
