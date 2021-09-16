<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use App\Models\Log;

class AddLog
{
    public function handle(FileDownloaded $event)
    {
        $log = new Log();
        $log->file_id = $event->data['file_id'];
        $log->user_email = $event->data['creator_email'];
        $log->save();
    }
}
