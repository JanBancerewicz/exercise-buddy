<?php

namespace App\Http\Requests;

use App\Models\Exercise;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|min:3|max:100',
            'content'=>'nullable|string|max:1000',
            'status'=>[
                'required',
                Rule::in(Exercise::getAvailableStatuses())
            ],
            'category'=>'required|integer|min:0|max_digits:9',
            'weight'=>'nullable|integer|max:100',
            'reps'=>'required|integer|min:1|max:100',
            'sets'=>'required|integer|min:1|max:100',
            'restTime'=>'required|integer|min:0|max:600',
        ];
    }
}
