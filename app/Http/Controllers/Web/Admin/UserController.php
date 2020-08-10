<?php

namespace App\Http\Controllers\Web\Admin;;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $userData = $this->validateRequest();

        if (User::create($userData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'User Added successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'sometimes',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->save();

        Session::flash('succes', 'User Updated Successfully');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'User deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('users.index');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
    }

    function profile()
    {
        $user = Auth()->user();
        return view('admin.user.show', compact('user'));
    }

    function profileUpdate(Request $request)
    {
        $user = Auth()->user();

       $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'sometimes',
            'image' => 'sometimes|nullable|image|'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/userImage/', $image_new_name);
            $user->image = '/storage/userImage/' . $image_new_name;
        }
        else{
            $image = 'noimage.jpg';
        }
        $user->save();

        Session::flash('succes', 'User Profile Updated Successfully');
        return redirect()->route('user.profile');
    }
}
