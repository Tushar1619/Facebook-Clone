<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotFoundException;
use App\Exceptions\ValidationErrorException;
use App\Http\Resources\Friend as ResourcesFriend;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FriendRequestController extends Controller
{
    public function store()
    {

        $data = request()->validate([
            'friend_id' => "required"
        ]);

        try {
            User::findOrFail($data['friend_id'])->friends()->syncWithoutDetaching(auth()->user());
        } catch (ModelNotFoundException $e) {
            throw new UserNotFoundException();
        }
    }
}
