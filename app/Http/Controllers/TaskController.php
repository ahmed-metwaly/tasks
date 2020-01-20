<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $data = Task::join('users', 'tasks.user_id', '=', 'users.id')->join('projects', 'projects.id', '=', 'project_id')->select('users.name as u_name', 'projects.name as p_name', 'tasks.name as name', 'tasks.status as status', 'tasks.end_date as end_date', 'tasks.id as id')->get();

        return view('tasks', compact('data'));

    }

    public function add() {
        $users = User::select('id', 'name')->get();
        $projects = Project::where('status', 'in progress')->select('id', 'name')->get();
        return view('task_add', compact(['users', 'projects']));
    }

    public function create(Request $request) {
        $rules = [
            'name' => 'required',
            'user_id' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
dd($validator);
            return redirect()->route('add-task')->withErrors($validator)->withInput();
        }

        $data = new Task;

        $data->name = $request->name;
        $data->project_id = $request->project_id;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->user_id = $request->user_id;

        return $data-> save() ? redirect()->route('tasks')->with('mOk', 'Added ^_^') : redirect()->route('add-task')->with('mNo', 'Error, Not Added.');

    }

    public function edit($id) {
        $id = (int) $id;
        $users = User::select('id', 'name')->get();
        $projects = Project::where('status', 'in progress')->select('id', 'name')->get();
        $data = Task::where('id', $id)->first();
        return view('task_edit', compact('data', 'users', 'projects'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('edit-task', $id)->withErrors($validator)->withInput();
        }

        $data = Task::where('id', $id)->first();
        $data->name = $request->name;
        $data->project_id = $request->project_id;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->user_id = $request->user_id;

        return $data-> save() ? redirect()->route('tasks')->with('mOk', 'Edited ^_^') : redirect()->route('edit-task', $id)->with('mNo', 'Error, Not Edited.');

    }


    public function delete($id) {
        return Task::where('id', $id)->delete() ? redirect()->route('tasks')->with('mOk', 'Deleted ^_^') : redirect()->route('tasks')->with('mNo', 'Error, Not Deleted.');

    }

}
