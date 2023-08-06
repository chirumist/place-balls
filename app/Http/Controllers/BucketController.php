<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use App\Http\Requests\BucketRequest;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buckets = Bucket::paginate(3);
        
        return view('system.buckets.index', compact('buckets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bucket = new Bucket;

        return view('system.buckets.form', compact('bucket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BucketRequest $request)
    {
        Bucket::create($request->all());

        return redirect()->route('buckets.index')->with('success', 'Bucket has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bucket $bucket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bucket $bucket)
    {
        return view('system.buckets.form', compact('bucket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BucketRequest $request, Bucket $bucket)
    {
        $bucket->update($request->all());
        
        return redirect()->route('buckets.index')->with('success', 'Bucket has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bucket $bucket)
    {
        $bucket->delete();
        
        return redirect()->route('buckets.index')->with('success', 'Bucket has been deleted!');
    }
}
