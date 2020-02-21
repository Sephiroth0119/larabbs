<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function save(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_toppic_body');

        $topic->excerpt = make_excerpt($topic->body);
    }
}
