<?php

namespace App\Http\Requests\Guest;

use App\Rules\NameRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255', new NameRule],
            'surname' => ['string', 'max:255', new NameRule],
            'email' => 'string|email|max:255|unique:guests,email',
            'phone' => ['string', 'unique:guests,phone', new PhoneRule],
            'country' => 'string|max:255'
        ];
    }
}
