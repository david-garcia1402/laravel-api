<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Http\Exception\CustomApiException;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();

        if ($users->count() === 0)
        {
            $return = new CustomApiException('Nenhum usuário cadastrado no momento', 404);
            $return->ApiStatus();
        } else {
            return $users;
        }

    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        if ($user) {
            $userCreate = new UserResource($user);
            $response = response()->json([
                "message"   => "Usuário cadastrado com sucesso.",
                "usuario"   => $userCreate->name,
                "email"     => $userCreate->email,
            ], 200);
            return $response;
        }
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

        $userUpdated = new UserResource($user);

        $response = response()->json([
            "message"   => "Usuário atualizado com sucesso",
            "newEmail"  => $userUpdated->email,
            "newName"   => $userUpdated->name
        ]);

        return $response;
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $deletedUser = $user->delete();
    }
}
