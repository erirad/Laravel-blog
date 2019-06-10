<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Channel;
use App\Discussion;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
      switch (request('filter')) {
        case 'me':
          $results = Discussion::where('user_id', Auth::id())->paginate(3);
          break;
        case 'solved':
          $solved = [];
          $discussions = Discussion::all();
          foreach ($discussions as $discussion) {
            if($discussion->hasBestAnswer()){
              array_push($solved, $discussion);
            }
          }
          $results = new Paginator($solved, 3);
          break;
          case 'unsolved':
            $unsolved = [];
            $discussions = Discussion::all();
            foreach ($discussions as $discussion) {
              if(!$discussion->hasBestAnswer()){
                array_push($unsolved, $discussion);
              }
            }
            $results = new Paginator($unsolved, 3);
            break;
        default:
          $results = Discussion::orderBy('created_at', 'desc')->paginate(3);
          break;
      }
      return view('forum', ['discussions' => $results]);
    }

    public function channel($slug)
    {
      $channel = Channel::where('slug', $slug)->first();
      return view('channel', ['discussions' => $channel->discussions()->paginate(5)]);
    }
}
