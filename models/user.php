<?php

Class User extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    public static function getUsers()
    {
        return User::get();
//      return User::where('name', 'like', '%a%')->get();
    }

    public static function findUsers($userName = null)
    {
        return User::where('name', 'like', '%'.$userName.'%')->get();
    }

}