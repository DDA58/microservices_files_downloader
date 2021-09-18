<?php

declare(strict_types=1);

namespace App\Subscribers;

use App\Events\FileDownloaded;
use App\Models\Log;

class LogFileDownloadedSubscriber
{
    public function handle(FileDownloaded $event): void
    {
        $log = new Log();
        $log->file_id = $event->data['file_id'];
        $log->user_email = $event->data['creator_email'];
        $log->save();
    }
}
