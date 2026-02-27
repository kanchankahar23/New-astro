<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagmanagementController extends Controller
{
    public function tagCreate()
    {
        return view('tag.tag-create');
    }
    public function tagList()
    {
        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('tag.tag-list', compact('tags'));
    }
    public function editTag($id)
    {
        $tag = Tag::find($id);
        return view('tag.tag-edit', compact('tag'));
    }
    public function TagEdit(request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->save();
        $tags = Tag::orderBy('id', 'DESC')->get();
        session()->flash('success', 'Tag Edit successful');
        return view('tag.tag-list', compact('tags'));
    }
    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $tags = Tag::orderBy('id', 'DESC')->get();
        session()->flash('success', 'Tag deleted successfull');
        return redirect('/tag-list')->with(compact('tags'));
    }
    public function checkName(request $request){
        $name = $request->input('name');
        $exists = Tag::where('name', $name)->exists();
        if ($exists) {
            return response()->json('exists');
        } else {
            return response()->json('available');
        }
    }
    public function tagStore(Request $request)
    {
        $name = $request->input('name');
        $exists = Tag::where('name', $name)->exists();
        if ($exists) {
            return back()->with('success', 'Tag Name already exist please try  again');
        } else {
                $tag = new Tag();
                $tag->name = $request->name;
                $tag->color = $request->color;
                $tag->save();
            return redirect('tag-list')->with('success', 'Tag added successfull');
        }
    }
}
