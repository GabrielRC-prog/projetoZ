<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Likes extends DataLayer
{
    public function __construct()
    {
        parent::__construct("likes", ["post_id", "user_id"], "id", true);
    
    }
    public function add(User $user, Post $post, string $like)
    {
        $this->user_id = $user->id;
        $this->post_id = $post->id;

        $this->save();

        return $this;

    }
}