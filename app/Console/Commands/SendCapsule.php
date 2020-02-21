<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use App\Model\Capsule;

class SendCapsule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'capsule:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send capsule message at combined date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('## BEGIN - '.now().'##');
        $today = (now())->format('Y-m-d');
        Log::info('## DATE - '.$today.'##');
        $data = Capsule::where('remember_at', '<=', $today)
            ->where('status', '=', 'N');
        Log::info('## COUNT - '.$data->count().'##');
        foreach ($data as $line) {
            Mail::to($line->email)->send(
                new OpenCapsuleMailable(
                    $line->created_at,
                    $line->from,
                    $line->to,
                    $line->message
                )
            );
            Capsule::where('id', $line->id)->update(
                [
                    'status' => 'R',
                    'deleted_at'=> now()
                ]
            );
        }
        Log::info('## EMAIL SENT AND UPDATE RECORDS ##');
        Log::info('## END - '.now().'##');
    }
}
