<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = [
            'John',
            'Maria'
        ];

        $count = count($users);

        return [
            'users' => $users,
            'count' => $count
        ];
    }
}
