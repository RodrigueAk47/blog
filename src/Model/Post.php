<?php


namespace App\Model;


use App\Helpers\Text;
use \DateTime;

class Post
{
    private int $id;

    private ?string $name;

    private  $content;

    private $slug;

    private   $created_at;

    private $categories = [];

    public function getExcerpt(): ?string
    {
        if ($this->content === null)  {
            return null;
        }
        return nl2br(htmlentities(Text::Excerpt($this->content, 60)));
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }



    /**
     * @return mixed
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return int
     */
    public function getID(): ?int
    {
        return $this->id;
    }

}