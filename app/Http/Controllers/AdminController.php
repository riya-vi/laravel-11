<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $totalUsers = User::get()->count() ; 

        // $totalUsers = DB::table('users')->get() ;
        // $totalUsers = User::get() ;

        $totalUsers = User::count() ;

        $totalProducts = DB::table('products')->get() ;
       
        // $users = DB::table('users')->select('users.name') ;
        // $products = DB::table('products')->select('products.name')->union($users)->get() ;

        // return $products ;
        // dd($products) ;

         return view('admin.dashboard', compact('totalUsers','totalProducts'));

       

        
    }

    public function showUsers()
    {
        // $activeUsers = User::where('active', 1)->get(); 
        // $users = User::active()->paginate(5) ;     //local scope

        // $users  = User::OfType('admin')->paginate(5) ;  // dynamic local scope

        $users = User::paginate(10) ;
        // $users = DB::table('users')->paginate(5);   // using db facade query builder 

        // return $users ;
       
        return view('admin.user-list', compact('users'));

        //     $data = [
        //         'title' => 'Users List',
        //         'users' => User::all(),
        //     ];
        //     return view('dashboard')->with($data) ;
    }

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
