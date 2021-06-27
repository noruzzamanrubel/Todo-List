<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Auth;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public  function index(){

        $todo= auth()->user()->todos()->orderBy('completed')->get();
        // $todo= Todo::orderBy('completed')->get();
        return view('Todo.all-todo', compact('todo'));
    }

    public  function create(){
        return view('Todo.create');
    }

    public  function store( Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:todos|max:255',
        ]);
        
        // $title = new Todo();
        // $title->title = $request->title;
        // $title->save();

        auth()->user()->todos()->create($request->all());
        
        // Todo::insert([
        //     'title'=>$request->title,
        // ]);

        return redirect()->route('all');
    }

    public  function edit(Todo $todo){
        return view('Todo.edit', compact('todo'));
    }

    public  function update( Request $request, Todo $todo){

        $todo->update([
            'title'=>$request->title,
        ]);
        return redirect()->route('all');
    }

    public function complete(Todo $todo){
        $todo->update([
            'completed'=>true,
        ]);
        return redirect()->back();
    }

    public function incomplete(Todo $todo){
        $todo->update([
            'completed'=>false,
        ]);
        return redirect()->back();
    }

    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->back();
    }
}
