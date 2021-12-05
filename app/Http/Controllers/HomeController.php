<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::with('category')->get();
        // $articles = Article::all();
        return view('home',compact('articles'));
    }
    public function editInfo(){
        return view('editInfo');
    }
    public function profile(){
        return view('profile');
    }
    public function updateInfo(Request $request){
        $user = User::find(Auth::id());

        $reName = uniqid()."_user.".$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs('public/img',$reName);
        $user->photo = $reName;

        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;
        $user->update();

        return redirect()->back()->with('status','Successfully Upload Profile');

    }
}
