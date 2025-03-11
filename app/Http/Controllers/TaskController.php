<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        //$tasks=DB::table('tasks')->get();
        $tasks=Task::all() ;

        return view('tasks' ,compact('tasks'));
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:10|min:3',
        ]);
        $tasks_name=$request->name;
        //DB::table('tasks')->insert(['name'=>$tasks_name,]);
        $task=new Task();
        $task->name=$tasks_name;
        $task->save();

        return redirect(to : 'tasks');
    }
    public function destroy($id)
    {
        //DB::table('tasks')->where('id',$id)->delete();
        Task::destroy($id);

        return redirect()-> back(); ;
    }
    public function edit($id)
    {

       // $task=DB::table('tasks')->where('id',$id)->first();
        // $tasks=DB::table('tasks')->get();
        $tasks=Task::all() ;
        $task=Task::find($id);

        return view('tasks' ,compact('task','tasks'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:10',
        ]);
       // $tasks_name=$_POST['name'];
        // $id=$_POST['id'];
        // DB::table('tasks')->where('id',$id)->update(['name'=>$tasks_name,]);
        $task=Task::find($_POST['id']);
        $task->name=$_POST['name'];
        $task->save();

        return redirect(to : 'tasks');
    }
  

}
