<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResorce;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $user = User::all();
        return UserResorce::collection($user);
    }

    public function images(StoreUpdateUserRequest $request)
    {
        if(!$request->hasfile('image_path')){
            return null;
        }
        $imagem = $request->file('image_path')->store('user_imagens');
        return '/storage/'.$imagem;
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $data['path_image'] = $this->images($request);
        $user = user::create($data);
        return new UserResorce($user);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return new UserResorce($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        return new UserResorce($user);
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([], status: 204);
    }
}
