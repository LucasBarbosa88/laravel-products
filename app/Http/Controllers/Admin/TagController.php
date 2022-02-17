<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('needsRole:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Tags';

        $tags = Tag::paginate(10);

        return view('admin/tags.index', compact('title' ,'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:tags',
        ]; 

        if($request->validate($rules)){
            $tag = Tag::createTag($request->name);

            if($tag){
                return redirect()->back()->with('success' ,'Tag created with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible create this Tag! Try again.');
            }
        }
        return redirect()->back()->with('danger', 'Not possible create this Tag! Try again.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $rules = [
            'name' => 'required|unique:tags',
        ];

        if($request->validate($rules)){
            $tag = Tag::updateTag($request->id, $request->name);

            if($tag) {
                return redirect()->back()->with('success', 'Tag update with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible update this Tag! Try again.!');
            }
        }

        return redirect()->back()->with('danger', 'Not possible update this Tag! Try again.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if($tag) {
            $tag->delete();

            return redirect()->back()->with('success', 'Tag deleted with success!');
        }
    }
}
