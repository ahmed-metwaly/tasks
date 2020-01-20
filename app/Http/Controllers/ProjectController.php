<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::join('users', 'projects.created_by', '=', 'users.id')->select('users.name as u_name', 'projects.id as id', 'projects.name as name', 'projects.status as status')->get();


        return view('all', compact('data'));

    }

    public function add() {
        return view('add');
    }

    public function create(Request $request) {
        $rules = [

            'name' => 'required',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('project-add')->withErrors($validator)->withInput();
        }

        $data = new Project;

        $data->name = $request->name;
        $data->status = $request->status;
        $data->created_by = 1;
        return $data-> save() ? redirect()->route('projects')->with('mOk', 'Added ^_^') : redirect()->route('project-add')->with('mNo', 'Error, Not Added.');

    }

    public function edit($id) {
        $id = (int) $id;
        $data = Project::where('id', $id)->first();



        return view('edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('project-edit', $id)->withErrors($validator)->withInput();
        }

        $data = Project::where('id', $id)->first();
        $data->name = $request->name;
        $data->status = $request->status;

        return $data-> save() ? redirect()->route('project-edit', $id)->with('mOk', 'Edited ^_^') : redirect()->route('project-edit', $id)->with('mNo', 'Error, Not Edited.');

    }

    public function delete($id) {
        return Project::where('id', $id)->delete() ? redirect()->route('projects')->with('mOk', 'Deleted ^_^') : redirect()->route('projects')->with('mNo', 'Error, Not Deleted.');

    }

}
