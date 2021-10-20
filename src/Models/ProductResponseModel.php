<?php

namespace Fypex\GamivoClient\Models;

class ProductResponseModel
{

    private $id;
    private $name;
    private $slug;
    private $description;
    private $cover;
    private $genres = [];
    private $languages = [];
    private $platform;
    private $screenshots = [];
    private $youtube_video_id;
    private $notice;
    private $region;
    private $release_date;
    private $lowest_price;


    public function __construct($data)
    {

        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->slug = $data['slug'];
        $this->description = $data['description'];
        $this->cover = $data['cover'];
        $this->genres = $data['genres'];
        $this->languages = $data['languages'];
        $this->platform = $data['platform'];
        $this->screenshots = $data['screenshots'];
        $this->youtube_video_id = $data['youtube_video_id'];
        $this->notice = $data['notice'];
        $this->region = $data['region'];
        $this->release_date = $data['release_date'];
        $this->lowest_price = $data['lowest_price'] ?? 0;

    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @return mixed
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * @return mixed
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @return mixed
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @return mixed
     */
    public function getScreenshots(): array
    {
        return $this->screenshots;
    }

    /**
     * @return mixed
     */
    public function getYoutubeVideoId(): string
    {
        return $this->youtube_video_id;
    }

    /**
     * @return mixed
     */
    public function getNotice(): string
    {
        return $this->notice;
    }

    /**
     * @return mixed
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @return mixed
     */
    public function getLowestPrice(): float
    {
        return $this->lowest_price;
    }




}
