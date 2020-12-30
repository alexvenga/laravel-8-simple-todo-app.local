<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return view('index')->with('todos', $todo);
    }

    public function create()
    {
        return view('create');
    }

    public function details()
    {

        return view('details');

    }

    public function edit()
    {

        return view('edit');

    }

    public function update()
    {

        //we will write codes for updating a todo here

    }

    public function delete()
    {

        //we will write codes for deleting a todo here

    }

    public function store()
    {

        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }


        $data = request()->all();


        $todo = new Todo();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');

    }
}
