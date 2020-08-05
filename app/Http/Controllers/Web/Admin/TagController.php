<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Session;

class TagController extends Controller
{

    public function index()
    {
        $data = array(
            'tags' => Tag::orderBy('created_at', 'desc')->get()
        );
        return view('admin.tag.index', $data);
    }

    public function create()
    {
        $data = array(
            'tag' =>  Tag::orderBy('name', 'asc')->get()
        );
        return view('admin.tag.create', $data);
    }

    public function store(Request $request)
    {
        $tagData = $this->validateRequest();

        $tagData['slug'] = $this->createSlug($this->checkSlug($request->name));
        if (Tag::create($tagData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Tag Added successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag)
    {
        $data = array(
            'tag' => $tag
        );
        return view('admin.tag.edit', $data);
    }

    public function update(Request $request, Tag $tag)
    {
        $tagData = $this->validateRequest();
        $tagData['slug'] = $this->createSlug($this->checkSlug($request->name));

        if ($tag->update($tagData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Tag Updated successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Tag deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('tag');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|unique:tags',
            'description' => 'sometimes',
        ]);
    }

    private function createSlug($name)
    {
        return $this->checkSlug(mb_strtolower(preg_replace('/[ ,.@#$%^&*()_\/=]+/', '-', trim($name)), 'UTF-8'));
    }

    private function checkSlug($slug)
    {
        $all_slugs = Tag::select('slug')->where('slug', 'like', $slug . '%')->get();

        if (!$all_slugs->contains('slug', $slug)) {
            return $slug;
        }
        $i = 1;
        while ($i++) {
            $new_slug = $slug . '-' . $i;
            if (!$all_slugs->contains('slug', $new_slug)) {
                return $new_slug;
            }
        }
    }

}
