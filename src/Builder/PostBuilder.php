<?php

namespace Builder;

class PostBuilder
{
    private Post $post;

    public function __construct(string $text, Post $post)
    {
        $this->post->text = $text;
    }

    public function addHashtags(array $hashtags): self
    {
        $this->post->hashtags = $hashtags;
        return $this;
    }

    public function addImage(string $image): self
    {
        $this->post->image = $image;
        return $this;
    }

    public function addLink(string $link): self
    {
        $this->post->link = $link;
        return $this;
    }

    public function build(): Post
    {
        return $this->post;
    }
}