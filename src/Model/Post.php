<?php


namespace App\Model;


use App\Helpers\Text;
use DateTime;
use Exception;
use App\Model\Category;
use JetBrains\PhpStorm\Pure;

class Post
{
    private int $id;

    private ?string $name;

    private  ?string $content;

    private ?string $slug;

    private $created_at;

    private array $categories = [];

    /**
     * @return string|null
     */
    #[Pure] public function getExcerpt(): ?string
    {
        if ($this->content === null)  {
            return null;
        }
        return nl2br(e(Text::Excerpt($this->content, 60)));
    }

    /**
     * @return string|null
     */
    #[Pure] public function getName(): ?string
    {
        return e($this->name);
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }


    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return int|null
     */
    public function getID(): ?int
    {
        return $this->id;
    }

    /**
     * @return ?string
     */
    #[Pure] public function getFormattedContent(): ?string
    {
        return nl2br(e($this->content));
    }

    public function addCategory(Category $category): void
    {
        $this->categories[] = $category;
        $category->setPost($this);
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

}