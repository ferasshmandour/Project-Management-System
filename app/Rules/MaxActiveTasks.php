<?php

namespace App\Rules;

use Closure;
use App\Enums\TaskStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxActiveTasks implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value) {
            return;
        }

        $activeTasks = DB::table('task_user as tu')
            ->join('tasks as t', 't.id', '=', 'tu.task_id')
            ->where('t.status', TaskStatus::Active)
            ->where('tu.user_id', $value)
            ->count();


        if ($activeTasks >= 5) {
            $fail('This user already has the maximum of 5 active tasks.', null);
        }
    }
}
