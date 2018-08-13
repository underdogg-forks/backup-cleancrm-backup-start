<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Attachments\Models\Attachment;

class AttachmentDeleted extends Event
{
    use SerializesModels;

    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }
}
