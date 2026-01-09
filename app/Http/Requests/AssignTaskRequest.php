<?php

namespace App\Http\Requests;

use App\Rules\MaxActiveTasks;
use Illuminate\Foundation\Http\FormRequest;

class AssignTaskRequest extends FormRequest
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
            'task_id' => ['nullable', 'exists:tasks,id'],
            'user_id' => ['nullable', 'exists:users,id', new MaxActiveTasks],
        ];
    }
}
