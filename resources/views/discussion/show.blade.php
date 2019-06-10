@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card m-3">
            <div class="card-header">
              <img src="https://vignette.wikia.nocookie.net/starwars/images/2/2d/Usser.png/revision/latest?cb=20160112173710" alt="" width="70px" height="70px"/>&nbsp;
              <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffforHumans() }}</b></span>
              @if(Auth::id() == $discussion->user->id)
                <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}" class="btn btn-info btn-sm float-right">Edit</a>
              @endif
              @if($discussion->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-default btn-sm float-right">Unwatch</a>
              @else
              <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-default btn-sm float-right">Watch</a>
              @endif
            </div>
            <div class="card-body">
              <h4 class="text-center font-weight-bold">
                {{ $discussion->title }}
              </h4>
              <p class="text-center">
                {!! Markdown::convertToHtml($discussion->content) !!}
              </p>
              <hr />
              @if($best_answer)
                <div class="text-center">

                </div>
              @endif
            </div>
            <div class="card-footer">
              <span>
                {{ $discussion->replies->count() }} Replies
              </span>
              <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" class="float-right btn btn-default btn-sm" disabled>{{ $discussion->channel->title }}</a>
            </div>
          </div>
          @foreach($discussion->replies as $reply)
            <div class="card m-3">
              <div class="card-header">
                <img src="https://vignette.wikia.nocookie.net/starwars/images/2/2d/Usser.png/revision/latest?cb=20160112173710" alt="" width="70px" height="70px"/>&nbsp;
                <span>{{ $reply->user->name }}, <b>{{ $reply->created_at->diffforHumans() }}</b> ( {{$reply->user->points}} )</span>
                @if(!$reply->best_answer)
                  @if(Auth::id())
                    <a href="{{ route('discussion.best.answer', ['id' => $reply->id]) }}" class="btn btn-sm btn-info float-right">Mark as best answer</a>
                  @endif
                @else
                  <button class="btn btn-sm btn-success float-right" disabled>Best answer</button>
                @endif
                @if(Auth::id() == $reply->user->id)
                  @if(!$reply->best_answer)
                    <a href="{{ route('reply.edit', ['id' => $reply->id]) }}" class="btn btn-sm btn-info float-right">Edit</a>
                  @endif
                @endif
              </div>
              <div class="card-body">
                <p class="text-center">
                  {{ $reply->content }}
                </p>
              </div>
              <div class="card-footer">
                @if($reply->is_liked_by_auth_user())
                  <a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="btn btn-danger btn-sm">Unlike <span class="badge">{{ $reply->likes->count() }}</span></a>
                @else
                  <a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="btn btn-success btn-sm">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                @endif
              </div>
            </div>
          @endforeach
          <div class="panel panel-default">
            <div class="panel-body">
              @if(Auth::check())
              <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="reply">Leave a reply...</label>
                  <textarea name="reply" id="reply" rows="10" cols="30" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn pull-right">Leave a reply</button>
                </div>
              </form>
              @else
              <h2>Sign in to leave a reply</h2>
              @endif
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
