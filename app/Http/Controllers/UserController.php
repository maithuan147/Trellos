<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;
    public function __Construct(user $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query('name',null);
        if(!empty($query)){
            $this->user = $this->user->where('name', 'like','%'.$query.'%');
        }
        $user = $this->user->paginate(5);
        // dd('user');
        $data = compact('user','query');
        return view('users.list',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , user $user)
    {
        
        $this->validate($request,[
            'image' => 'image',
            'name' => 'required|min:3|max:20',
            'email'    => 'required|min:10|max:50|email|unique:users',
            'password' => 'required|min:5|max:20',
            'password_confirmation' => 'required|min:5|max:20'
        ]);
        $file = $request->file('image');
        $filename = time().$file->getClientOriginalName();
        $checkExtension =['jpg','png','svg'];
        $extension = $file->getClientOriginalExtension();
        if ($request->hasFile('image')) {
           // if (in_array($extension,$checkExtension)) {
                $user->image = $file->move('img', $filename);
                //$password = array();
                $user->password = Hash::make($request->password);
                $data = $request->except('image','password');
                $user->fill($data);
                $user->save();
                if($request->submitback){
                    return back()->withInput()->with('create','Them Thanh Cong');
                }else if($request->submitexit){
                    return redirect()->route('user.index');
                }
                
            // }else{
            //     return back()->withInput()->with('errfile', 'Đuôi không đúng định dạng jpg,png,svg');
            // }
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,user $user)
    {
        // $search = $request->search;
        // $post = $user::find(1)->where('name', 'like','%'.$search.'%');
        // $data = compact('$post');
        // return view('users.list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $data = compact('user');
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:20',
            'email'    => ['required','min:10','max:50','email',Rule::unique('users')->ignore($user->id),],
            'password' => 'required|min:5|max:20',
            'password_confirmation' => 'required|min:5|max:20'
        ]);
        $file = $request->file('image');
        $filename = time().$file->getClientOriginalName();
        $checkExtension =['jpg','png','svg'];
        $extension = $file->getClientOriginalExtension();
        if ($request->hasFile('image')) {
            if (in_array($extension,$checkExtension)) {
                $user->image = $file->move('img', $filename);
                //$password = array();
                $user->password = Hash::make($request->password);
                $data = $request->except('image','password','email');
                $user->fill($data);
                $user->save();
                if($request->submitback){
                    return back()->withInput()->with('edit','Sua Thanh Cong');
                }else if($request->submitexit){
                    return redirect()->route('user.index');
                }
                
            }else{
                // $errfile = 'Đuôi không đúng định dạng jpg,png,svg';
                // $err = compact('errfile');
                // return view('users.create',$err);
                return back()->withInput()->with('errfile', 'Đuôi không đúng định dạng jpg,png,svg');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
    // public function search(Request $request)
    // {
    //     $search = $request->get('search');
        
    //     $user = user::paginate(5)->where('name', 'like','%'.$search.'%');
    //     dd($user);
    //     $data = compact('user');
    //     return view('users.list',$data);
    // }
}
