<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function welcome()
    {
        return view('welcome');

    }

    public function hello()
    {

        return 'hello world ';
    }

    public function show(string $slug, int $id)
    {
        return [
            'slug' => $slug,
            'id' => $id];
    }

    public function new2()
    {
        /* return [
            'welcome'=>route('welcome'),
            'hello'=>route('hello'),
        ]; */
        return to_route('blog.show', ['id' => 96, 'slug' => 'new-article']);
    }
}
