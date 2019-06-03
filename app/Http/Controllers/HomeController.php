<?php

namespace App\Http\Controllers;

use App\user;
use App\Task;
use App\Comment;
use App\Listtask;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // $data = compact('CountUser','CountTask','CountComment','CountListtask');
        return view('index');
    }
    public function upload(Request $request,user $user){
        $file = $request->file('image');
        $filename = time().$file->getClientOriginalName();
        $checkExtension =['jpg','png','svg'];
        $extension = $file->getClientOriginalExtension();
        if ($request->hasFile('image')) {
            if (in_array($extension,$checkExtension)) {
                $user->image = $file->move('img', $filename);
                $data = $request->except('name','password','email','status','image');
                $user->fill($data);
                $user->save();
                return redirect()->route('home');
            }else{
                $errfile = 'Đuôi không đúng định dạng jpg,png,svg';
                $CountUser = user::count();
                $CountTask = Task::count();
                $CountComment = Comment::count();
                $CountListtask = Listtask::count();
                $data = compact('CountUser','CountTask','CountComment','CountListtask','errfile');
                return view('index',$data);
            }
        }
    }
}
