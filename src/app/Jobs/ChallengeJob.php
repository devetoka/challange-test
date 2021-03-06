<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ChallengeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $item;

    /**
     * Create a new job instance.
     *
     * @param $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $user = User::create([
            'name' => $this->item->name,
            'address' => $this->item->address,
            'date_of_birth' => $this->item->date_of_birth,
            'email' => $this->item->email,
            'interest' => $this->item->interest,
            'description' => $this->item->description,
        ]);

       $user->account()->create([
          'account_id' => $this->item->account,
          'checked' => $this->item->checked,
          'credit_card_meta' => json_encode($this->item->credit_card),
       ]);

    }
}
