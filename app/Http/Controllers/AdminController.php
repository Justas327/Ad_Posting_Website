<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of all users
     *
     * @return Response
     */
    public function index()
    {
        if (auth()->user()->role != 2) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $users = User::orderBy('role', 'asc')->paginate(10);
        return view('admin.index')->with('users', $users);
    }

    public function allow($id)
    {
        if (auth()->user()->role != 2) {
            return redirect('/admin')->with('error', 'Unauthorized Page');
        }

        $user = User::find($id);
        $user->create_ad = true;
        $user->save();

        return redirect('/admin')->with('success', 'Leidimas sėkmingai suteiktas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
