<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Model\Capsule;
use App\Model\User;
use App\Notifications\OpenCapsule;

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
        $this->info('## BEGIN - '.now().' ##');
        $today = (now())->format('Y-m-d');
        $this->info('## DATE - '.$today.' ##');
        $data = DB::table('capsules')
            ->join('users', 'capsules.user_id', '=', 'users.id')
            ->select('capsules.*')
            ->where('status', 'N')
            ->whereDate('capsules.remember_at', '<=', $today)
            ->whereNull('capsules.deleted_at')
            ->get();
        $this->info('## COUNT - '.$data->count().' ##');
        foreach ($data as $capsule) {
            $capsule = Capsule::find($capsule->id);
            $capsule->notify(
                new OpenCapsule(
                    $capsule->created_at,
                    $capsule->from,
                    $capsule->to,
                    $capsule->message
                )
            );
            Capsule::where('id', $capsule->id)->update(
                [
                    'status' => 'R',
                    'deleted_at'=> now(),
                ]
            );
            sleep(rand(1, 10));
        }
        $this->info('## EMAIL SENT AND UPDATE RECORDS ##');
        $this->info('## END - '.now().' ##');
    }
}
