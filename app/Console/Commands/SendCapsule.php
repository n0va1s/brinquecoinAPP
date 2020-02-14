<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Mail\OpenCapsuleMailable;

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
        $data = DB::table('capsules')
            ->select(
                'capsules.id',
                'capsules.from',
                'capsules.to',
                'capsules.email',
                'capsules.message'
            )
            ->distinct()
            ->where('capsules.status', 'N')
            ->whereNull('capsules.deleted_at')
            ->whereDate('capsules.remember_at', '<=', $today)
            ->get();
        
        Log::info('## QUANTITY - '.$data->count().'##');

        foreach ($data as $line) {
            $sender = Mail::to($line->email);
            $sender->send(
                new OpenCapsuleMailable(
                    $line->from,
                    $line->to,
                    $line->message
                )
            );
            Capsule::where('id', $line->id)->update(['status' => 'R']);
        }
        Log::info('## END - '.now().'##');
    }
}
