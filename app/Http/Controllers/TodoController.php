<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Auth;
use Illuminate\Http\Request;

class TodoController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {

        $todo = auth()->user()->todos()->orderBy( 'completed' )->get();

        return view( 'Todo.all-todo', compact( 'todo' ) );
    }

    public function create() {
        return view( 'Todo.create' );
    }

    /**
     * @param Request $request
     */
    public function store( Request $request ) {
        $validated = $request->validate( [
            'title'       => 'required|unique:todos|max:255',
            'description' => 'required|unique:todos|max:255',
        ] );

        auth()->user()->todos()->create( $request->all() );

        return redirect()->route( 'all' );
    }

    /**
     * @param Todo $todo
     */
    public function show( Todo $todo ) {
        return view( 'todo.show', compact( 'todo' ) );
    }

    /**
     * @param Todo $todo
     */
    public function edit( Todo $todo ) {
        return view( 'Todo.edit', compact( 'todo' ) );
    }

    /**
     * @param Request $request
     * @param Todo $todo
     */
    public function update( Request $request, Todo $todo ) {

        $validated = $request->validate( [
            'title'       => 'required|unique:todos|max:255',
            'description' => 'required|unique:todos|max:255',
        ] );

        $todo->update( [
            'title'       => $request->title,
            'description' => $request->description,
        ] );
        return redirect()->route( 'all' );
    }

    /**
     * @param Todo $todo
     */
    public function complete( Todo $todo ) {
        $todo->update( [
            'completed' => true,
        ] );
        return redirect()->back();
    }

    /**
     * @param Todo $todo
     */
    public function incomplete( Todo $todo ) {
        $todo->update( [
            'completed' => false,
        ] );
        return redirect()->back();
    }

    /**
     * @param Todo $todo
     */
    public function delete( Todo $todo ) {
        $todo->delete();
        return redirect()->back();
    }
}
