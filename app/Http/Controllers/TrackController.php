<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;
use Redirect;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
          'author' => 'required|max:255',
          'title' => 'required|max:255',
          'album' => 'nullable',
          'image' => 'nullable'
      ]);

        $track = new Track;
        $track->author = $request->author;
        $track->title = $request->title;
        $track->album = $request->album;
        $track->image = $request->image;
        $track->save();
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        $tracks = Track::all();
        return view('index', compact('tracks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        //
    }
}
