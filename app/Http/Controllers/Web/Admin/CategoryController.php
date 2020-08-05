<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Session;

class CategoryController extends Controller
{

    public function index()
    {
        $data = array(
            'categories' => Category::orderBy('created_at', 'desc')->get()
        );
        return view('admin.category.index', $data);
    }

    public function create()
    {
        $data = array(
            'category' =>  Category::orderBy('name', 'asc')->get()
        );
        return view('admin.category.create', $data);
    }

    public function store(Request $request)
    {
        $categoryData = $this->validateRequest();

        $categoryData['slug'] = $this->createSlug($this->checkSlug($request->name));
        if (Category::create($categoryData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category Added successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('category.index');
    }
    
    public function edit(Category $category)
    {
        $data = array(
            'category' => $category
        );
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        $categoryData = $this->validateRequest();
        $categoryData['slug'] = $this->createSlug($this->checkSlug($request->name));

        if ($category->update($categoryData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category Updated successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        if ($category->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('category');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|unique:categories',
            'description' => 'sometimes',
        ]);
    }

    private function createSlug($name)
    {
        return $this->checkSlug(mb_strtolower(preg_replace('/[ ,.@#$%^&*()_\/=]+/', '-', trim($name)), 'UTF-8'));
    }

    private function checkSlug($slug)
    {
        $all_slugs = Category::select('slug')->where('slug', 'like', $slug . '%')->get();

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

// $this->validate($request, [
//     'name' => "required|unique:categories,name,$category->name"
//     For update same value
// ]);
