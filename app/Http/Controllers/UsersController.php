<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $flight = new User;

        $flight->name = $request->leader;
        $flight->phone = $request->phone;

        $id = $flight->save();
        var_dump($id);
    }
}
