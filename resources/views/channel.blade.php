@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($discussions as $discussion)
              <div class="card m-3">
                <div class="card-header">
                  <img src="https://vignette.wikia.nocookie.net/starwars/images/2/2d/Usser.png/revision/latest?cb=20160112173710" alt="" width="70px" height="70px"/>&nbsp;
                  <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffforHumans() }}</b></span>
                  @if($discussion->hasBestAnswer())
                  <span class="btn btn-dark float-right btn-sm" disabled>closed</span>
                  @else
                  <span class="btn btn-success float-right btn-sm" disabled>open</span>
                  @endif
                  <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-default float-right">view</a>
                </div>
                <div class="card-body">
                  <h4 class="text-center font-weight-bold">
                    {{ $discussion->title }}
                  </h4>
                  <p class="text-center">
                    {{ str_limit($discussion->content, 100) }}
                  </p>
                </div>
                <div class="card-footer">
                    <span>
                      {{ $discussion->replies->count() }} Replies
                    </span>
                    <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" class="float-right btn btn-default btn-sm" disabled>{{ $discussion->channel->title }}</a>
                </div>
              </div>
            @endforeach
            <div class="text-center">
              {{ $discussions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
