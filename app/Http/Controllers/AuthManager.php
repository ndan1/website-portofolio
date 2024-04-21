<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    //
    function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function loginPost(Request $request){
    $request->validate([
        'email'=>'required',
        'password'=>'required'
    ]);

    $credentials = $request->only('email','password');
    if(Auth::attempt($credentials)){
        return redirect()->intended(route('home'));
    }
    return redirect(route('login'))->with("error", "Wrong email or password!");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("Error", "Registration failed, try again!");
        }
        return redirect(route('login'))->with("Success", "Registration sucessfull, you can login to access the website.");
    }

    function logout(){
        Session::flush();
        Auth::Logout();
        return redirect(route('home'));
    }

    public function postkomentar(Request $request){
        if (auth()->check()) {
            $request->request->add(['user_id' => auth()->user()->id]);
            $komentar = Komentar::create($request->all());
            return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
        } else {
            return redirect(route('login'))->with('error', 'Anda harus login untuk memposting komentar.');
        }
    }

    public function index()
    {
        // $komentars = Komentar::orderBy('created_at', 'desc')->get();
        $komentars = Komentar::orderBy('created_at', 'desc')->paginate(5);
        return view('home', compact('komentars'));

    }

    public function destroy(Komentar $comment): RedirectResponse{
        $comment->delete();
        return back();
    }

    // public function edit($id){
    //     $user =auth()->user();
    //     return view ('edit', compact('user'));
    // }

    public function edit()
    {
        $user = auth()->user();
        return view('edit', compact('user'));
    }

    public function updateProfile(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed', // tambahkan validasi sesuai kebutuhan
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect(route('home'))->with("success", "Profile updated successfully!");
        }

}
