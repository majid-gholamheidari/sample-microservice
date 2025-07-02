<?php

namespace App\Jobs;

use App\Models\Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreEventJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $event_name;
    protected $payload;

    /**
     * @param $user_id
     * @param $event_name
     * @param $payload
     */
    public function __construct($user_id, $event_name, $payload = null)
    {
        $this->user_id = $user_id;
        $this->event_name = $event_name;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $event = Event::query()->create([
            'user_id' => $this->user_id,
            'event_name' => $this->event_name,
            'payload' => $this->payload ?? [],
        ]);
    }
}
