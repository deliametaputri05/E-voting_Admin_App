<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }

    public function index()
    {
        // $user = User::count();
        // $job = Job::count();
        // $user = User::count();
        // $job = Job::all()->count();
        // $company = Company::all()->count();
        // $apply = ApplyJob::all()->count();
        // $save = Save::all()->count();
        // $menu = Menu::all()->count();
        // $slider = Slider::all()->count();
        // return view('admin.index', compact('user', 'job', 'apply', 'company'));
        return view('admin.index');
    }
}
