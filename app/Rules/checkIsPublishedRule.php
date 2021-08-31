<?php

namespace App\Rules;

use App\Models\Subject;
use Illuminate\Contracts\Validation\Rule;

class checkIsPublishedRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $isPublished = Subject::where('subjectuuid', $value)->first();
        if($isPublished->isPublished)
            return true;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Subject is not published yet.';
    }
}
