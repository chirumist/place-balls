<?php

namespace App\Http\Controllers;

use App\Models\Balls;
use App\Http\Requests\BallsRequest;
use Illuminate\Contracts\View\View;

class BallsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $balls = Balls::paginate(3);
        
        return view('system.balls.index', compact('balls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ball = new Balls;

        return view('system.balls.form', compact('ball'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BallsRequest $request)
    {
        Balls::create($request->all());

        return redirect()->route('balls.index')->with('success', 'Ball has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Balls $balls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balls $ball)
    {
        return view('system.balls.form', compact('ball'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BallsRequest $request, Balls $ball)
    {
        $ball->update($request->all());
        
        return redirect()->route('balls.index')->with('success', 'Ball has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balls $ball)
    {
        $ball->delete();
        
        return redirect()->back()->with('success', 'Ball has been deleted!');
    }
}
