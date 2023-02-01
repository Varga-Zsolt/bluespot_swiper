<?php

namespace App\Http\Requests;

use App\Models\Swipe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SwipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('swipes')
                    ->where('swiped_user_id', $this->swiped_user_id)
            ],
            'swiped_user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
            'action' => 'required|in:' . implode(',', Swipe::ALLOWED_ACTIONS)
        ];
    }

    public function messages()
    {
        return [
            'user_id.unique' => 'couple user_id and swiped_user_id has to be unique.',
        ];
    }
}
