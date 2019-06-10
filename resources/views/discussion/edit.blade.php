@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="panel panel-defaut">
            <div class="panel-heading">
              Update a discussion
            </div>
            <div class="panel-body">
              @if(Auth::check())
              <form action="{{route('discussion.update', ['id' => $discussion->id])}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="content">Ask a question</label>
                  <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-success pull-right" type="submit">Save discussion changes</button>
                </div>
              </form>
              @else
              <div class="text-center">
                <h2>Sign in to leave a reply</h2>
              </div>
              @endif
            </div>
          </div>

        </div>
    </div>
</div>
@endsection
