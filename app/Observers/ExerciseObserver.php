<?php

namespace App\Observers;
use App\Jobs\CreateUniqueIdToken;
use App\Models\Exercise;

class ExerciseObserver
{
    public function creating(Exercise $exercise){
        CreateUniqueIdToken::dispatch($exercise);
    }
    public function updating(Exercise $exercise){
        CreateUniqueIdToken::dispatch($exercise);
    }

}
