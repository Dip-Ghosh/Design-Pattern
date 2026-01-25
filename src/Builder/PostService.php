<?php

namespace Builder;

class PostService
{
    public function createPost(): void
    {
        $post = (new PostBuilder("Builder Pattern in PHP made easy"))
            ->addHashtags(["#DesignPatterns", "#PHP", "#CleanCode"])
            ->addImage("builder.png")
            ->addLink("https://example.com")
            ->build();

        $post->preview();
    }
}