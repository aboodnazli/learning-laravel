<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
       // $users=DB::table('users')->get();
        $users=User::all();

        return view('users' ,compact('users'));
    }
    public function create()
    {
       /* $users_name=$_POST['name'];
        $users_email=$_POST['email'];
        $users_password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        DB::table('users')->insert(['name'=>$users_name,]);
        DB::table('users')->insert(['email'=>$users_email,]);
        DB::table('users')->insert(['password'=>$users_password,]); */
        $user=new User();
        $user->name=$_POST['name'];
        $user->email=$_POST['email'];
        $user->password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->save();

        return redirect(to : 'users');
    }
    public function destroy($id)
    {
       // DB::table('users')->where('id',$id)->delete();
       User::destroy($id);

        return redirect()-> back(); ;
    }
    public function edit($id)
    {
       // $user=DB::table('users')->where('id',$id)->first();
        // $users=DB::table('users')->get();
        $users=User::all() ;
        $user=User::find($id);

        return view('users' ,compact('user','users'));
    }
    public function update()
    {
      /*  $users_name=$_POST['name'];
        $id=$_POST['id'];
        $users_email=$_POST['email'];
        $users_password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        DB::table('users')->where('id',$id)->update(['name'=>$users_name,]);
        DB::table('users')->where('id',$id)->update(['email'=>$users_email,]);
        DB::table('users')->where('id',$id)->update(['password'=>$users_password,]); */
        $user=User::find($_POST['id']);
        $user->name=$_POST['name'];
        $user->email=$_POST['email'];
        $user->password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->save();

        return redirect(to : 'users');
    }
}
