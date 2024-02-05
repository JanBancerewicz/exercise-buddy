<?php

namespace App\Jobs;

use App\Models\Exercise;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreateUniqueIdToken
{
    use Dispatchable, SerializesModels;


    protected $exercise;

    /**
     * Create a new job instance.
     */
    public function __construct(Exercise $exercise)
    {
        $this->exercise = $exercise;
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
        
        $idTokenExists = $matchingTokens->contains(function(Exercise $exercise, int $index) use($idToken){
            return $exercise->idToken == $idToken;
        });
        
        if($idTokenExists){
            $matchingCount = $matchingTokens->count();
            $idToken = "$idToken-$matchingCount";
        }
            $this->exercise->idToken = $idToken;
    }

    protected function getCurrentExerciseIdToken(){
        return Str::slug($this->exercise->title);
         
    }

    protected function getRelatedIdTokens(string $idToken){
        return Exercise::select('idToken')
        ->where('idToken', "LIKE", "$idToken%")
        ->where('id', '<>', $this->exercise->id)
        ->get();
    }
}
