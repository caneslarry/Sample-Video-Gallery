<?php
declare(strict_types=1);

namespace App\Domain\Video;

use JsonSerializable;

class Video implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $video_id;
    /**
     * @var string
     */
    private $category;


    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $video_id
     * @param string $category
     */
    public function __construct(int $id, string $title, string $description, string $video_id, string $category='')
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->video_id = $video_id;
        $this->category = $category;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getVideoId(): string
    {
        return $this->video_id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'video_id' => $this->video_id,
            'category' => $this->category,
        ];
    }
}
