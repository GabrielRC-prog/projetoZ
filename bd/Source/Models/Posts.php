<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Post extends DataLayer
{
    public function __construct()
    {
        parent::__construct("posts", ["user_id", "content"], "id", true);
    }

    public function add(User $user, string $content)
    {
        $this->user_id = $user->id;
        $this->content = $content; 

        $this->save();

        return $this;
    }

}