<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

use App\Model\Board;
use App\Notifications\Reminder;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'board:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily reminder to responsible use the board with your sons';

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
        $data = Board::all();
        $this->info('## COUNT - '.$data->count().' ##');
        foreach ($data as $board) {
            $board->user->notify(
                new Reminder($board)
            );
            sleep(rand(1, 10));
        }
        $this->info('## REMINDER SENT ##');
        $this->info('## END - '.now().' ##');
    }
}
