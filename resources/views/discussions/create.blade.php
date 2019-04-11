@extends('layouts.app')

@section('content')
  @include('errors.error')
  <div class="card">
      <div class="card-header">Add Discussion </div>
          <div class="card-body">
              <form action="{{route('discussion.store')}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                      <label for="content">Content</label>
                      <input id="content" type="hidden" name="content">
                      <trix-editor input="content"></trix-editor>
                  </div>
                  <div class="form-group">
                      <label for="channel">Channel</label>
                      <select name="channel_id" id="channel_id" class="form-control">
                          @foreach($channels as $channel)
                              <option value="{{$channel->id}}">{{$channel->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <button class="btn btn-success">Create Discussion</button>
              </form>
          </div>
  </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css">
@endsection

@section('js')
    <style>
        trix-editor {
            height: 150px !important;
            max-height: 150px !important;
            overflow-y: auto !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.js"></script>
@endsection