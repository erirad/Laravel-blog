@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">Create a new channel</div>
              <form action="{{ route('channels.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="channel" class="form-control"/>
                </div>
                <div class="form-group">
                  <div class="text-center">
                    <button class="btn btn-success" type="submit">Save channel</button>
                  </div>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection
