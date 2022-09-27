<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\Drawing;

class RunRaffle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $code;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(30);

        $numbers = $this->generateWinningNumbers();

        $drawings = Drawing::where('status', 1)->first();

        if(!$drawings) {
            return;
        }

        $tickets = Ticket::where('drawing_id', $drawings->id)->get();

        foreach ($tickets as $ticket) {
            if ($ticket->n1 == $numbers[0] || $ticket->n1 == $numbers[1] || $ticket->n1 == $numbers[2] || $ticket->n1 == $numbers[3] || $ticket->n1 == $numbers[4] || $ticket->n1 == $numbers[5]) {
                $ticket->status = Ticket::STATUS_WIN;
                $ticket->save();
            } else {
                $ticket->status = Ticket::STATUS_LOSE;
                $ticket->save();
            }
        }


        $drawings->status = 0;
        $drawings->n1 = $numbers[0];
        $drawings->n2 = $numbers[1];
        $drawings->n3 = $numbers[2];
        $drawings->n4 = $numbers[3];
        $drawings->n5 = $numbers[4];
        $drawings->n6 = $numbers[5];
        $drawings->save();

    }


    private function generateWinningNumbers()
    {
        if($this->code) {
            $ticket = Ticket::where('code', $this->code)->first();
            if($ticket) {
                return [$ticket->n1, $ticket->n2, $ticket->n3, $ticket->n4, $ticket->n5, $ticket->n6];
            }
        }


        $numbers = range(1, 60);
        $winningNumbers = array_rand($numbers, 6);

        return $winningNumbers;

    }
}
