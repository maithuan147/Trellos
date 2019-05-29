<?php

namespace App\Http\Controllers;

use App\Listtask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listtasks = Listtask::paginate(5);
        $data = compact('listtasks');
       // dd($listtask);
        return view('list_task.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list_task.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Listtask $listtask)
    {
        $data = $request->all();
        //dd($data);
        $listtask->fill($data);
       // dd($listtask);
        $listtask->save();
        return redirect()->route('listtask.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listtask  $listtask
     * @return \Illuminate\Http\Response
     */
    public function show(Listtask $listtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listtask  $listtask
     * @return \Illuminate\Http\Response
     */
    public function edit(Listtask $listtask)
    {
        $data = compact('listtask');
        
        return view('list_task.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listtask  $listtask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listtask $listtask)
    {
        $data = $request->all();
        //dd($data);
        $listtask->fill($data);
       // dd($listtask);
        $listtask->save();
        return redirect()->route('listtask.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listtask  $listtask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listtask $listtask)
    {
        $listtask->delete();
        return redirect()->route('listtask.index');
    }
  
}
