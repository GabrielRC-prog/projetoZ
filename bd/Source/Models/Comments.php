<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

use Exception;

class Comments extends DataLayer
{
    public function __construct()
    {
        parent::__construct("comments", ["post_id", "user_id", "content"], "id", true);
    }

    public function add(User $user, Post $post, string $content)
    {
        if(empty($content)){
            throw new Exception("O conteúdo não pode estar vazio.");
        }
        $this->user_id = $user->id;
        $this->post_id = $post->id;
        $this->content = $content; 

        $this->save();

        return $this;
    }
}