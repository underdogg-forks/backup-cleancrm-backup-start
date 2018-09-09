<?php

namespace App\Http\Controllers;

use Laratrust\LaratrustFacade as Laratrust;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Laratrust::hasRole('admin')) {
            return $this->adminDashboard();
        }
        if (Laratrust::hasRole('owner')) {
            return $this->ownerDashboard();
        }
        if (Laratrust::hasRole('member')) {
            return $this->memberDashboard();
        }
    }


    private function adminDashboard()
    {
        return view('dashboard.admin');
    }


    private function ownerDashboard()
    {
        return view('dashboard.owner');
    }


    private function memberDashboard()
    {
        return view('dashboard.member');
    }


}
