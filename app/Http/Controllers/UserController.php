<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = !is_null($request->query('keyword')) ? $request->query('keyword') : '';
        $user_id = !is_null($request->query('user_id')) ? $request->query('user_id') : '';
        $name = !is_null($request->query('name')) ? $request->query('name') : '';
        $email = !is_null($request->query('email')) ? $request->query('email') : '';
        $sort = !is_null($request->query('sort')) ? $request->query('sort') : '';
        $params = [$keyword, $name, $email, $sort];

        $user = new User();
        /* $users = User::paginate(20); */
        $users = $user->filter($params);
        $data = ['users' => $users];

        return view('admin.users.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data = ['user' => $user];

        return view('admin.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = ['user' => $user];

        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $id = $user->id;

        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'postal_code' => $request->postal_code,
            'pref_id' => $request->pref_id,
            'city' => $request->city,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'tel' => $request->tel,
        ];

        User::where('id', $id)
            ->update($params);

        $product = User::find($id);
        $data = ['user' => $user];

        return redirect()->route('admin.users.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $id = $user->id;
        User::destroy($id);
    }
}
