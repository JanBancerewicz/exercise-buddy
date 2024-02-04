<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Exceptions\InvalidArgumentException;


/**
 * Task model.
 * 
 * @property string $title
 * @property string $idToken
 * @property string $content
 * @property string $status
 * @property int $category
 * @property int $weight
 * @property int $reps
 * @property int $sets
 * @property int $restTime
 */
class Task extends Model
{
    use HasFactory;

    protected const AVAILABLE_STATUSES =[
        'Active' => 'active',
        'Completed' => 'completed'
    ];

    protected $fillable = [
        'title', 'idToken', 'content', 'status', 'category', 'weight', 'reps', 'sets', 'restTime'
    ];

    protected $attributes =[
        'content' => '',
        'status' => self::AVAILABLE_STATUSES['Active']
    ];

    public static function getStatus(string $key){
        if(!array_key_exists($key, self::AVAILABLE_STATUSES)){
            throw new InvalidArgumentException(
                sprintf("Status for key [%s] does not exist.", $key)
            );
        }

        return self::AVAILABLE_STATUSES[$key];
    }

    public static function getAvailableStatuses(bool $keys = false){
        if($keys){
            return array_keys(self::AVAILABLE_STATUSES);
            
        }
        
        return array_values(self::AVAILABLE_STATUSES);
    } 


    public function getRouteKeyName(){
        return "idToken";
    }


    public function matchStatus(string $key){
        return ($this->status == self::getStatus($key));
    }

    public function setIdToken(string $idToken){
        $this->attributes['idToken']=$idToken;
    }
}
