<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
         
        $users = User::paginate();
        $userData = new UserResource($users);

        return view('viewapi', ['userData' => $userData]);
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return new UserResource($user);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        $user = User::findOrFail($id);
        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return response()->json([], 204);
    }
}
