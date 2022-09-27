<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\PrizeDraw;

class RunPrizeDraw implements ShouldQueue
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

        $prizeDraw = PrizeDraw::where('status', PrizeDraw::STATUS_ACTIVE)->first();

        if(!$prizeDraw) {
            return;
        }

        $tickets = Ticket::where('prize_draw_id', $prizeDraw->id)->get();

        foreach ($tickets as $ticket) {
            if ($ticket->n1 == $numbers[0] || $ticket->n1 == $numbers[1] || $ticket->n1 == $numbers[2] || $ticket->n1 == $numbers[3] || $ticket->n1 == $numbers[4] || $ticket->n1 == $numbers[5]) {
                $ticket->status = Ticket::STATUS_WIN;
                $ticket->save();
            } else {
                $ticket->status = Ticket::STATUS_LOSE;
                $ticket->save();
            }
        }


        $prizeDraw->status = PrizeDraw::STATUS_FINISHED;
        $prizeDraw->n1 = $numbers[0];
        $prizeDraw->n2 = $numbers[1];
        $prizeDraw->n3 = $numbers[2];
        $prizeDraw->n4 = $numbers[3];
        $prizeDraw->n5 = $numbers[4];
        $prizeDraw->n6 = $numbers[5];
        $prizeDraw->save();

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
