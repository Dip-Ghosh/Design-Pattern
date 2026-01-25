<?php

namespace Builder;

class Post
{
    public string  $text;
    public array   $hashtags = [];
    public ?string $image    = null;
    public ?string $link     = null;

    public function preview(): void
    {
        echo $this->text;
        echo implode(' ', $this->hashtags);
        echo $this->image ? "Image: {$this->image}" : '';
        echo $this->link ? "Link: {$this->link}" : '';
    }
}