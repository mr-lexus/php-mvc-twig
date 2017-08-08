<?php

Class Users
{
    public function index()
    {
        $data['users'] = User::getUsers();
        $data['title'] = rand(0, 1) ? "Hello" : "Bye";
        $view = new View();
        $view->render('users/index', $data);
    }

    public function create()
    {
        echo "Class create";
        $view = new View();
        $view->render('users/create');
    }

    public function store()
    {
        echo "method store";
        $user = new User();
        $user->name = $_POST['name'];
        $user->save();
        echo "user " . $user->name . " saved";
    }

    public function find()
    {
        $view = new View();
        $view->render('users/find');
    }

    public function findUser()
    {
        echo User::findUsers($_POST['name']);
    }

}