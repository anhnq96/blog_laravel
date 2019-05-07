<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['title', 'description']);
        $category = Tag::create($input);

        if (!$category) {
            $request->flash();
            return back()->with([
                'status' => false,
                'message' => 'Error when add Tag',
                'messageClass' => 'alert-danger'
            ]);
        } else {
            return back()->with([
                'status' => true,
                'message' => 'Add Tag successful',
                'messageClass' => 'alert-success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only('title', 'description', 'status');
        $tag = Tag::find($id);
        $tag->update($input);

        if (!$tag) {
            return back()->with([
                'status' => false,
                'message' => 'Error when update tag',
                'messageClass' => 'alert-danger'
            ]);
        } else {
            return back()->with([
                'status' => true,
                'message' => 'Update tag successful',
                'messageClass' => 'alert-success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        if ($tag) {
            $tag->delete();
        } else {
            return response()->json([
                'status' => false,
                'message' => 'This tag not exist',
                'messageClass' => 'alert-danger'
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Delete tag successful',
            'messageClass' => 'alert-success'
        ]);
    }
}
