<?php

namespace App\Jobs;

use App\Models\Task;

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
    public function __construct(Task $task)
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
        $idToken=$this->getCurrentTaskIdToken();

        $matchingTokens = $this->getRelatedIdTokens($idToken);
        
        $idTokenExists = $matchingTokens->contains(function(Task $task, int $index) use($idToken){
            return $task->idToken == $idToken;
        });
        
        if($idTokenExists){
            $matchingCount = $matchingTokens->count();
            $idToken = "$idToken-$matchingCount";
        }
            $this->task->idToken = $idToken;
    }

    protected function getCurrentTaskIdToken(){
        return Str::slug($this->task->title);
         
    }

    protected function getRelatedIdTokens(string $idToken){
        return Task::select('idToken')
        ->where('idToken', "LIKE", "$idToken%")
        ->where('id', '<>', $this->task->id)
        ->get();
    }
}
