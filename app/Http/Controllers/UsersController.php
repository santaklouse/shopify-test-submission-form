<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class UsersController extends Controller
{

    /**
     * Save users
     *
     * @param  Request  $request
     * @return Response
     */
    public function saveAction(Request $request)
    {
        $user = new User;

        $user->name = $request->get('leader-name');
        if (!$user->name) {
            throw new Exception('Leader name cannot be empty');
        }
        $user->phone = $request->get('leader-phone');
        $user->leader_id = NULL;

        $user->save();

        $guest_names = $request->get('guest-names');
        $guest_phones = $request->get('guest-phones');
        $guests = [];
        for ($i = 0; $i < count($guest_names); $i++)
        {
            $guests[] = [
                'name' => $guest_names[$i],
                'phone' => $guest_phones[$i],
                'leader_id' => $user->id
            ];
        }
        User::insert($guests);
        return redirect('/');
    }
}
