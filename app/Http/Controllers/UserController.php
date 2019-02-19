<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email | max:50',
            'name'  => 'required | min:2 | max:50',
            'phone' => 'required | numeric | max:999999999999999',
        ]);

        $user = new User([
            'name'  => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        $user->save();

        return response()->json('successfully added', 200);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email | max:50',
            'name'  => 'required | min:2 | max:50',
            'phone' => 'required | numeric | max:999999999999999',
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json('successfully deleted');
    }
}
