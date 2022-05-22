<?php

namespace App\Http\Controllers\Admin;

use App\Model\ActivityType;
use App\Model\PropouseType;
use App\Model\BoardType;
use Illuminate\Support\Str;

class BootstrapController
{
    public function activity()
    {
        $data = ActivityType::all();
        foreach ($data as $line) {
            if ($line['code'] === 'migration') {
                ActivityType::find($line['id'])->update(['code'=> Str::uuid()->toString()]);
            }
        }
        echo "Activity done!";
    }

    public function board()
    {
        $data = BoardType::all();
        foreach ($data as $line) {
            if ($line['code'] === 'migration') {
                BoardType::find($line['id'])->update(['code'=> Str::uuid()->toString()]);
            }
        }
        echo "Board done!";
    }

    public function propouse()
    {
        $data = PropouseType::all();
        foreach ($data as $line) {
            if ($line['code'] === 'migration') {
                PropouseType::find($line['id'])->update(['code'=> Str::uuid()->toString()]);
            }
        }
        echo "Propouse done!";
    }
}


