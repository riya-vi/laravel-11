<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $totalUsers = User::get()->count() ;
        // $totalUsers = DB::table('users')->get() ;
        $totalUsers = User::get() ;

        $totalProducts = DB::table('products')->get() ;
        return view('admin.dashboard', compact('totalUsers','totalProducts'));
    }

    public function showUsers()
    {
        // $activeUsers = User::where('active', 1)->get(); 

        $users = DB::table('users')->paginate(5);

        return view('admin.user-list', compact('users'));

        if ($request->keyword != '') {
            $users = User::where('name', 'LIKE', '%' . $request->keyword . '%')->get();
        }
        return response()->json([
            'users' => $users
        ]);

        //     $data = [
        //         'title' => 'Users List',
        //         'users' => User::all(),
        //     ];

        //     return view('dashboard')->with($data) ;
    }

    // public function update($id)
    // {
    //     $user = User::find($id);
    //     if ($user) {
    //         if ($user->active) {
    //             $user->active = 0;
    //         } else {
    //             $user->active = 1;
    //         }
    //         $user->update();
    //     }
    //     return back();
    // }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->active = !$user->active; 
            $user->update();
        }
        return back();
    }

    
}
