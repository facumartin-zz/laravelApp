<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tasks=Tasks::orderBy('id','DESC')->paginate(3);
        return view('index',compact('tasks'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,['taskName'=>'required','priority'=>'required','duration'=>'required','project'=>'required']);
        Tasks::create($request->all());
        return redirect()->route('tasks.index')->with('success','Registro creado satisfactoriamente');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tasks=Tasks::find($id);
      return  view('show',compact('Tasks'));
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tasks=Tasks::find($id);
      return view('edit',compact('tasks'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
       $this->validate($request,['taskName'=>'required','priority'=>'required','duration'=>'required','project'=>'required']);
       tasks::find($id)->update($request->all());
       return redirect()->route('tasks.index')->with('success','Registro actualizado satisfactoriamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tasks::find($id)->delete();
       return redirect()->route('tasks.index')->with('success','Registro eliminado satisfactoriamente');
        //
    }
}
