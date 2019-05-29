<?php

namespace App\Http\Controllers;

use App\Task;
use App\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = Attachment::paginate(5);
        $data = compact('attachments');
        return view('attachments.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::all();
        $data = compact('tasks');
        return view('attachments.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Attachment $attachment)
    {
        $data = $request->all();
        $attachment->fill($data);
        $attachment->save();
        return redirect()->route('attachment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        $tasks = Task::all();
        $data = compact('tasks');
        $data1 = compact('attachment');
        //dd($data);
        return view('attachments.edit',$data,$data1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        $data = $request->all();
        $attachment->fill($data);
        $attachment->save();
        return redirect()->route('attachment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        $attachment->delete();
        return redirect()->route('attachment.index');
    }
}
