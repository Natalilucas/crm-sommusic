<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUser($id){
        //dd($id);

        $myUser = DB::table('users')
        ->where('id', $id)
        ->first();

        return view('users.view', compact('myUser'));
    }

    public function allUsers(){
        $search = request()->query('search') ? request()->query('search') : null;
        $users = DB::table('users');

        if($search){
            $users = $users ->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "{$search}%");
        }
        
        $users = $users->get();


        return view('users.all_users', compact('users'));
    }

    public function addUser(){
           return view('users.add_user');
        }

        public function createUser(Request $request){
            $request->validate([
                'email' => 'required|unique:users',
                'name' => 'required|string|max:10',
            ]);

            User::insert([
                'name' => $request->name,
                'email' =>$request->email,
                'password'=>Hash::make($request->password),
            ]);

            return redirect()->route('users.all')->with('message', 'Boa, estamos a caminho de ter uma super app com utilizadores adicionados!');
        }

        public function updateUser(Request $request){
            //dd($request->all());

            User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                //adress e phone
            ]);

            return redirect()->route('users.all')->with('message', 'Utilizador Atualizado!');
        }

        public function deleteUser($id){
            Db::table('tasks')
            ->where('user_id', ($id))
            ->delete();

            Db::table('users')
                ->where('id', ($id))
                ->delete();

            return back();
        }


}
