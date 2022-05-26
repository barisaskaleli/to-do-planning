<?php

namespace App\Repositories;

use App\Interfaces\DeveloperRepositoryInterface;
use App\Models\Developer;

class DeveloperRepository implements DeveloperRepositoryInterface
{
    /**
     * @param $data
     * @return void
     */
    public function getDevelopers()
    {
        return Developer::get();
    }
}
