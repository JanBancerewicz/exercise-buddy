<?php

namespace App\Jobs;

use App\Models\Exercise;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreateUniqueIdToken
{
    use Dispatchable, SerializesModels;


    protected $task;

    /**
     * Create a new job instance.
     */
    public function __construct(Exercise $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     * 
     * @return void
     */
    public function handle()
    {
        $idToken=$this->getCurrentExerciseIdToken();

        $matchingTokens = $this->getRelatedIdTokens($idToken);
        
        $idTokenExists = $matchingTokens->contains(function(Exercise $task, int $index) use($idToken){
            return $task->idToken == $idToken;
        });
        
        if($idTokenExists){
            $matchingCount = $matchingTokens->count();
            $idToken = "$idToken-$matchingCount";
        }
            $this->task->idToken = $idToken;
    }

    protected function getCurrentExerciseIdToken(){
        return Str::slug($this->task->title);
         
    }

    protected function getRelatedIdTokens(string $idToken){
        return Exercise::select('idToken')
        ->where('idToken', "LIKE", "$idToken%")
        ->where('id', '<>', $this->task->id)
        ->get();
    }
}
