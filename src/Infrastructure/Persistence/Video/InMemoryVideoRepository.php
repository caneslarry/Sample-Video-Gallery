<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Video;

use App\Domain\Video\Video;
use App\Domain\Video\VideoNotFoundException;
use App\Domain\Video\VideoRepository;

class InMemoryVideoRepository implements VideoRepository
{
    /**
     * @var Video[]
     */
    private $videos;

    /**
     * InMemoryVideoRepository constructor.
     *
     * @param array|null $videos
     */
    public function __construct(array $videos = null)
    {
        $this->videos = $videos ?? [
            1 => new Video(1, 'ffffWhat It’s Like To Work At AlgaeCal', 'Discover what it’s like to work at AlgaeCal with this quick video!', 'm3ralniniq', 'AlgaeCal'),
            2 => new Video(2, 'Esther Mangini Testimonial', 'Esther’s journey to healthier bones', 'ybyot0dm7q'),
            3 => new Video(3, 'Teresa Cucurull Testimonial', 'Teresa’s journey to healthier bones', 'mhmv73k989'),
            4 => new Video(4, 'Perfect Pilates For Osteoporosis - Legwork', 'Bone Healthy Exercises!', '3n5p02h26w'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->videos);
    }

    /**
     * {@inheritdoc}
     */
    public function findVideoOfId(int $id): Video
    {
        if (!isset($this->videos[$id])) {
            throw new VideoNotFoundException();
        }

        return $this->videos[$id];
    }
}
