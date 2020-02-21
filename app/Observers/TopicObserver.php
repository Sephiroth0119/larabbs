<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function save(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);
    }
}