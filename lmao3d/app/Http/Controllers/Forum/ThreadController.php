<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Thread;
use App\Client;
use App\Tag;

class ThreadController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    function __construct()
    {
        return $this->middleware('auth:client')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('tags')){
            $tag=Tag::find($request->tags);
            $threads=$tag->threads;
        }else{
        $threads=Thread::paginate(15);
        }
        return view('thread.index' , compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $this->validate($request, [
            'subject' => 'required',
            'tags'    => 'required',
            'thread'  => 'required',
            //'g-recaptcha-response' => 'required|captcha'
        ]);


        //Thread::create($request->all());
        $thread = auth()->user()->threads()->create($request->all());
      
        $thread->tags()->attach($request->tags);

        // //redirect
        return redirect()->back()->withMessage("Thread Created Successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('thread.single', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $this->validate($request, [
            'subject' => 'required',
            'tags'    => 'required',
            'thread'  => 'required',
        ]);

        if(auth()->user()->id !== $thread->client_id)
        {
            abort(401,"unauthorized");
        }
        $thread->update($request->all());

        return redirect()->route('thread.show', $thread->id)->withMessage('Thread Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        if(auth()->user()->id !== $thread->client_id)
        {
            abort(401,"unauthorized");
        }

        $thread->delete();

        return redirect()->route('thread.index')->withMessage("Thread Deleted!");
    }

    public function markAsSolution(Request $request)
    {
        $solutionId = $request->get('solutionId');
        $threadId = $request->get('threadId');

        $thread = Thread::find($threadId);
        $thread->solution = $solutionId;
        if ($thread->save()) {
            if (request()->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'marked as solution']);
            }
            return back()->withMessage('Marked as solution');
        }
    }
}
