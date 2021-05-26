<?php

namespace App\Model;


class Category
{
    private ?int $id;

    private ?string $slug;

    private ?string $name;


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
}