<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Squire\Models\Region;
use Squire\Models\Country;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        if($request->filled('search')){
            $users = User::search($request->search)->get();
        }else{
            $users = User::get();
        }
          
        return view('users', compact('users'));
    }

    public function create()
    {
        $countries = Country::orderBy('name')->pluck('name', 'id');
        $states = Region::orderBy('name')->where('country_id', 'in')->pluck('name', 'id');
        return view('create',compact('countries','states'));

    }
}
