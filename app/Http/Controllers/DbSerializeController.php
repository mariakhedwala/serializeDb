<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;

class DbSerializeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dump_users = User::all();
        $users = $dump_users;
        $all_users = User::displayAll($dump_users);
        return view('serialize.index', compact('all_users','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serialize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //validate form
            $validated = request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed|min:6'
            ]);
            
            $data = User::detail($validated);
            // return $data;
            // User::create($validated);
            $user = new User();
            // dd($user);
            $user->first_name = $data;
            $user->last_name = '';
            $user->email = '';
            $user->password = '';
            // $user->first_name = $data;
            $user->save();
            // DB::insert('insert into users (first_name) values(?)',[$validated]);
            return redirect('/feed');

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                dd('Duplicate Entry');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return User::display($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $edit_user = User::display($user);
        return view('serialize.edit', compact('edit_user', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        try {
            //validate form
            $validated = request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
            ]);
            
            $data = User::detail($validated);
            // return $data;
            // User::create($validated);
            // dd($user);
            $user->first_name = $data;
            $user->last_name = '';
            $user->email = '';
            $user->password = '';
            // $user->first_name = $data;
            $user->save();
            // DB::insert('insert into users (first_name) values(?)',[$validated]);
            return redirect('/feed');

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                dd('Duplicate Entry');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
