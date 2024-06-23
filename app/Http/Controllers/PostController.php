<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=post::all();
        
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=new post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->created_at=Carbon::now();
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $deletedpost=post::onlyTrashed()->get();
        return view('posts.archive',compact('deletedpost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post=post::findorfail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post=post::findOrFail($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function restore($id){
        $post=post::withTrashed()->find($id);
        $post->restore();
        return redirect()->back();
    }
    public function delete($id){
        $post=post::withTrashed()->find($id);
        $post->forceDelete();
        return redirect()->back();
    }
}
