<?php

namespace App\Repositories;

use App\Models\Log;

class LogRepository
{
    private $log;
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function getAll()
    {
        return Log::all();
    }

    /**
     * @param $log
     * @return mixed
     */
    public function store($log)
    {
        return $this->log->create($log);
    }
}