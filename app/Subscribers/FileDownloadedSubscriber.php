<?php

declare(strict_types=1);

namespace App\Subscribers;

use App\Events\FileDownloaded;
use App\Jobs\ProduceFileDownloadedJob;
use App\Services\JobDispatcher\IJobDispatcher as JobDispatcher;

final class FileDownloadedSubscriber
{
    private JobDispatcher $jobDispatcher;

    public function __construct(JobDispatcher $jobDispatcher)
    {
        $this->jobDispatcher = $jobDispatcher;
    }

    public function handle(FileDownloaded $event): void
    {
        $this->jobDispatcher->dispatch(
            new ProduceFileDownloadedJob($event->getData())
        );
    }
}
