$this->validate($request, [
    'title' => 'required|unique:posts',
    'image' => 'required|image',
    'description' => 'required',
    'category_id' => 'required',
]);

$post = Post::create([
    'title' => $request->title,
    'slug' => Str::slug($request->title),
    'image' => 'image.jpg',
    'description' => $request->description,
    'user_id' => auth()->user()->id,
    'published' => Carbon::now(),
]);
if ($post->save()) {
    Session::flash('response', array('type' => 'success', 'message' => 'Post Added successfully!'));
} else {
    Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
}
return redirect('post');
