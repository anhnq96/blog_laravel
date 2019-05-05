<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['title', 'description']);
        $category = Category::create($input);

        if (!$category) {
            $request->flash();
            return back()->with([
                'status' => false,
                'message' => 'Error when add category',
                'messageClass' => 'alert-danger'
            ]);
        } else {
            return back()->with([
                'status' => true,
                'message' => 'Add category successful',
                'messageClass' => 'alert-success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $input = $request->only('title', 'description', 'status');
        $category = Category::find($id);
        $category->update($input);

        if (!$category) {
            return back()->with([
                'status' => false,
                'message' => 'Error when update category',
                'messageClass' => 'alert-danger'
            ]);
        } else {
            return back()->with([
                'status' => true,
                'message' => 'Update category successful',
                'messageClass' => 'alert-success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                $category->delete();
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'This category not exist',
                    'messageClass' => 'alert-danger'
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => 'Delete category successful',
                'messageClass' => 'alert-success'
            ]);
        } catch (FatalThrowableError $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error when delete category',
                'messageClass' => 'alert-danger'
            ]);
        }

    }
}
