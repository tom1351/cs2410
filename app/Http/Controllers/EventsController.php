<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Event;
use App\Like;

use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $events = Event::where('commencing', '>', Carbon::now())->orderBy('commencing', 'asc');
        
        if ($month = request('month')) {
            $events->whereMonth('commencing', Carbon::parse($month)->month);
        }
        
        if ($category = request('category')) {
            $events->where('category', $category);
        }
        
        if (request('showMyEvents') == 'true' && auth()->check()) {
            $events->where('user_id', auth()->user()->id);
        }
        
        if (request('popularity') == 'most') {
            $events = Event::withCount('likes')->orderBy('likes_count', 'desc');
        }
        else if (request('popularity') == 'least') {
            $events = Event::withCount('likes')->orderBy('likes_count', 'asc');
        }
        
        $events = $events->get();
        
        $byMonth = Event::selectRaw('monthname(commencing) month, count(*) published')
            
            ->groupBy('month')
            
            ->get()
            
            ->toArray();
        
        $byCategory = Event::selectRaw('category, count(*) published')
            
            ->groupBy('category')
            
            ->get()
        
            ->toArray();
        
        
        
        return view('events.index', compact('events', 'byMonth', 'byCategory'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|filled|max:80',
            'description' => 'required|filled',
            'commencing' => 'required|date|after:now',
            'featured' => 'required|boolean|min:0|max:1',
            'category' => 'required|in:sport,culture,other',
            'venue' => 'required',
            'linked_event' => 'nullable|present',
            'thumbnail_id' => 'required|exists:media,id'
        ]);
        
        $event =  new Event(request(['title', 'description', 'featured', 'commencing', 'category', 'venue', 'linked_event', 'thumbnail_id']));
        
        auth()->user()->publish(
            $event
        );
        
        $event->media()->attach(request()->thumbnail_id);
        
        return redirect('/');
    }

    /**
     * Display the specified resource in JSON format.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $event = Event::find($id);
        
        $response = [
            'id' => $event->id,
            'commencing' =>$event->getHumanDateTime(),
            'title' => $event->title,
            'category' => $event->category,
            'description' => $event->description,
            'author' => $event->user->name,
            'venue' => $event->venue,
            'linkedEvent' => $event->linked_event,
            'imageUrl' => $event->getEventThumbnailUri(),
            'likeCount' => $event->likes()->count(),
            'author_email' => $event->user->email,
            'author_tel' => $event->user->telephone_num
        ];
        
        return Response::json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required|filled|max:80',
            'description' => 'required|filled',
            'commencing' => 'required|date|after:now',
            'featured' => 'required|boolean|min:0|max:1',
            'category' => 'required|in:sport,culture,other',
            'venue' => 'required',
            'linked_event' => 'nullable|present',
            'thumbnail_id' => 'required|exists:media,id'
        ]);
        
        $event = Event::find($id);
        
        //Fetch the pivot holding the thumbnail relation
        $thumbnail_relation = $event->media()->where([
            ['event_id', '=', $event->id],
            ['media_id', '=', $event->thumbnail_id]
        ])->get()->first();
        
        $thumbnail_relation->pivot->media_id = request()->thumbnail_id;
        $thumbnail_relation->pivot->save();
        
        $event->update(request(['title', 'description', 'featured', 'commencing', 'category', 'venue', 'linked_event', 'thumbnail_id']));
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        
        return back();
    }
    
    /**
     * Allow the user to like the event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {
        $event_id = $request->eventId;
        $user = auth()->user();
        $user_id = $user->id;
        
        $like = $user->likes()->where('event_id', $event_id)->first();
        if($like) {
            $like->delete();
        } 
        else {
            $like = new Like();
            $like->user_id = $user->id;
            $like->event_id = $event_id;
            $like->save();
        }
        
    }
}
