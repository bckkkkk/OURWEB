<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AllowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$users = User::all();
        return view('allow.index')
				->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach($request -> user_id as $key => $value)
        {
            $User = User::findOrFail($value);
            $User -> allow = $request -> allow[$key];
            $User -> save();
        }

        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', '權限修改成功！');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
		$User = User::findOrFail($request->user_id);
		$content = $request->validate([
            'allow' => 'required',
        ]);
		
		$User -> update($content);
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', $User);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}