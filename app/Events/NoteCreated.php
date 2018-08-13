<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Notes\Models\Note;

class NoteCreated extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }
}
