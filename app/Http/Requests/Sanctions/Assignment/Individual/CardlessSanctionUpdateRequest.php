<?php

namespace App\Http\Requests\Sanctions\Assignment\Individual;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CardlessSanctionUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'sanction' => 'required|integer|exists:sanction_cardlesses,id',
            'minute' => [
                'required',
                'integer',
                'min:0',
                'min:999',
                Rule::unique('player_local_sanction_cardless')->where(function ($query) {
                    $query->where('event_id', $this->route('event')->id);
                })->ignore($this->route('sanction')),
                Rule::unique('player_visitor_sanction_cardless')->where(function ($query) {
                    $query->where('event_id', $this->route('event')->id);
                })->ignore($this->route('sanction')),
            ]
        ];
    }
}
