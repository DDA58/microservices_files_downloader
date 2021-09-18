<?php

namespace App\Http\Controllers;

use App\Services\EventDispatcher\IEventDispatcher;
use App\Events\FileDownloaded;
use App\Models\File;

class FileDownloadController extends Controller
{
    private IEventDispatcher $dispathcer;

    public function __construct(IEventDispatcher $dispatcher)
    {
        $this->dispathcer = $dispatcher;
    }

    public function download(File $file) {
        $response = response($file->filecontent)->withHeaders([
            'Content-type' => $file->mime,
            'Content-Disposition' => ' attachment; filename='.$file->name
        ]);

        $this->dispathcer->dispatch(new FileDownloaded([
            'file_id' => $file->id,
            'link'=> 'http://0.0.0.0/files_downloader/file/'.$file->id,
            'filename' => $file->name,
            'creator_email' => auth()->user()->email,
            'count' => $file->logs()->get('user_email')->count()
        ]));

        return $response;
    }
}
