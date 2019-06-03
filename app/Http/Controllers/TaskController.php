<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = task::paginate(5);
        // $comment = task::find(1)->listtask;
        // dd($comment);
        $data = compact('task');
        // dd($data);
        return view('tasks.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Task $task)
    {
        $this->validate($request,[
            'title' => 'unique:tasks,title|min:3|max:255',
            'description'  => 'min:3|max:1000'
        ],[
            'title.unique' => 'Title không được trùng',
            'title.min' => 'Tên không được nhỏ hơn 3 ký tự',
            'title.max' => 'Tên không được lớn hơn 255 ký tự',
            'description.min' => 'Tên không được nhỏ hơn 3 ký tự',
            'description.max' => 'Tên không được lớn hơn 1000 ký tự',
        ]);
        $data = $request->all();
        $task->fill($data);
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $data = compact('task');
        return view('tasks.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request,[
            'title' => 'unique:tasks,title|min:3|max:255',
            'description'  => 'min:3|max:1000'
        ],[
            'title.unique' => 'Title không được trùng',
            'title.min' => 'Tên không được nhỏ hơn 3 ký tự',
            'title.max' => 'Tên không được lớn hơn 255 ký tự',
            'description.min' => 'Tên không được nhỏ hơn 3 ký tự',
            'description.max' => 'Tên không được lớn hơn 1000 ký tự',
        ]);
        $data = $request->all();
        $task->fill($data);
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }
}
