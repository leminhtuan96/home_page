<?php

namespace App\Repositories;

use App\Models\Screen;

class ScreenRepository extends BaseRepository
{
    protected $screen;

    const PAGINATE = 10;

    public function __construct(Screen $screen)
    {
        $this->screen = $screen;
    }

    public function store(array $data)
    {
        return $this->screen->create($data);
    }

    public function getAll($paginate = true)
    {
        if ($paginate) {
            return $this->screen->paginate(self::PAGINATE);
        }

        return $this->screen->all();

    }

}
