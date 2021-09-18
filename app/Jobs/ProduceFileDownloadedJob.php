<?php

namespace App\Jobs;

class ProduceFileDownloadedJob extends ABaseJob
{
    private array $data;

    public $queue = 'default';

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle() {

    }
}
