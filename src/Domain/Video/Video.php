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
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $video_id
     */
    public function __construct(int $id, string $title, string $description, string $video_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->video_id = $video_id;
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
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'video_id' => $this->video_id,
        ];
    }
}
