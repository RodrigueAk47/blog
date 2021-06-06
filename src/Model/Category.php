<?php

namespace App\Model;


class Category
{
    private ?int $id;
    private ?string $slug;
    private ?string $name;
    private $post_id;
    private $post;


    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return e($this->name);
    }

    /**
     * @return ?int
     */
    public function getID(): ?int
    {
        return $this->id;
    }

    /**
     * @return int | null
     */
    public function getPostID(): ?int
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post
     */
    public function setPost(post $post): void
    {
        $this->post = $post;
    }
}