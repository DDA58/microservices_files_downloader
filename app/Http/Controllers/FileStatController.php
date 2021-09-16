<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Log;

class FileStatController extends Controller
{
    public function __invoke(File $file, User $user)
    {
        $log = $file->logs()->get('user_email');

        return response()->json([
            'count' => $log->count(),
            'emails' => $log->map(static fn(?Log $l): ?string => $l->user_email)->toArray()
        ]);

    }
}
