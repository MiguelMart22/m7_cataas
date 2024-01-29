<?php

namespace App\Http\Controllers;

use App\Models\CatImage;
use App\Http\Requests\StoreCatImageRequest;
use App\Http\Requests\UpdateCatImageRequest;
use Illuminate\Http\Request;

class CatImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$cats = CatImage::all()->limit(10);
        $tag = $request->input('tags');
        $offset = $request->input('offset') ?? 0;
        $limit = $request->input('limit') ?? 10;

        $cats = CatImage::select('_id','tags')
        ->where('tags', 'like', '%'.$tag.'%')
        ->offset($offset)
        ->take($limit)
        ->get();
        return $cats;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatImageRequest $request)
    {
        $cat = CatImage::create([
            '_id' => $request->input('_id'),
            'mimetype' => $request->input('mimetype'),
            'size' => $request->input('size'),
            'tags' => $request->input('tags')
        ]);
        return response()->json($cat);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatImage $catImage)
    {
        return $catImage;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatImage $catImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatImageRequest $request, CatImage $catImage)
    {
        $catImage->update([
            '_id' => $request->input('_id'),
            'mimetype' => $request->input('mimetype'),
            'size' => $request->input('size'),
            'tags' => $request->input('tags')
        ]);
        return response()->json($catImage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatImage $catImage)
    {
        $catImage->delete();
        return response()->json(['success' => true]);
    }

    // public function gatitos(Request $request) {
    //     $tag = $request->input('tags');
    //     $offset = $request->input('offset')?? 0;
    //     $limit = $request->input('limit')?? 10;

    //     $cats = CatImage::select('_id','tags')
    //                     ->where('tags', 'like', '%'.$tag.'%')
    //                     ->offset($offset)
    //                     ->take($limit)
    //                     ->get();

    //     $cats = file_get_contents('http://localhost:8000/api/cats');

    //     return view('cats.index',compact('cats'));
    // }

}
