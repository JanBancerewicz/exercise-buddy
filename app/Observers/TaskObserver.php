<?php

namespace App\Observers;
use App\Jobs\CreateUniqueIdToken;
use App\Models\Task;

class TaskObserver
{
    public function creating(Task $task){
        CreateUniqueIdToken::dispatch($task);
    }
    public function updating(Task $task){
        CreateUniqueIdToken::dispatch($task);
    }

}
