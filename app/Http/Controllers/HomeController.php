<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contarUsuarios() {
        
        $only_users = User::where('administrador',FALSE AND 'ecoponto',FALSE)->count();

        $only_admin = User::where('administrador','=',TRUE)->count();

        $only_ecoponto = User::where('ecoponto','=',TRUE)->count();

        $users_total=DB::table('users')->count();

        
        return view('home')->with(
            [
                'qtd_user' => $only_users,
                'qtd_admin' => $only_admin,
                'qtd_ecoponto' => $only_ecoponto,
                'qtd_total' => $users_total
            ]
        );
    }

}
