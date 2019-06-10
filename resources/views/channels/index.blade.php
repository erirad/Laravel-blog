@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="">Channels</div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($channels as $channel)
                          <tr>
                            <td>{{ $channel->title }}</td>
                            <td>
                              <a href="{{route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-xs btn-info">Edit</a>
                            </td>
                            <td>
                              <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
