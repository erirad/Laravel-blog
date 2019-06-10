<?php

namespace App\Http\Controllers;

use App\Discussion;
use Notification;
use Auth;
use Session;
use App\Reply;
use App\User;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function show($slug)
    {
      $discussion = Discussion::where('slug', $slug)->first();
      $best_answer = $discussion->replies()->where('best_answer', 1)->first();
      return view('discussion.show')
                                    ->with('discussion', $discussion)
                                    ->with('best_answer', $best_answer);
    }

    public function create()
    {
      return view('discuss');
    }

    public function reply(Request $request, $id)
    {
      $discussion = Discussion::find($id);
      $reply = Reply::create([
        'user_id' => Auth::id(),
        'discussion_id' => $id,
        'content' => $request->reply
      ]);

      $watchers = [];
      foreach($discussion->watchers as $watcher){
        array_push($watchers, User::find($watcher->user_id));
      }
      Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

      Session::flash('success', 'Replied for discussion');

      return redirect()->back();
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'channel_id' => 'required',
        'content' => 'required',
        'title' => 'required'
      ]);
      $discussion = Discussion::create([
        'title' => $request->title,
        'content' => $request->content,
        'channel_id' => $request->channel_id,
        'user_id' => Auth::id(),
        'slug' => str_slug($request->title)
      ]);
      Session::flash('success', 'Discussion succesfully created.');

      return redirect()->route('discussion', ['slug' => $discussion->slug]);
  }

  public function edit($slug)
  {
    return view('discussion.edit', ['discussion' => Discussion::where('slug', $slug)->first()]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'content' => 'required'
    ]);
    $discussion = Discussion::find($id);
    $discussion->content = $request->content;
    $discussion->save();

    Session::flash('success', 'Discussion updated');

    return redirect()->route('discussion', ['slug' => $discussion->slug]);
  }
}
