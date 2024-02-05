<?php

namespace App\Observers;
use App\Jobs\CreateUniqueIdToken;
use App\Models\Exercise;

class ExerciseObserver
{
    public function creating(Exercise $task){
        CreateUniqueIdToken::dispatch($task);
    }
    public function updating(Exercise $task){
        CreateUniqueIdToken::dispatch($task);
    }

}
