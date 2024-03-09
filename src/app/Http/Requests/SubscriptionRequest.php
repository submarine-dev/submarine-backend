<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
        $validate =[];

        $validate += [
            'subscriptionName' => [
                'required',
                'string',
                'max:255'
                ]
            ];

        $validate += [
            'icon' => [
                'required',
                'string',
                'max:255'
                ]
            ];

        $validate += [
            'color' => [
                'required',
                'string',
                'max:6'
                ]
            ];

        $validate += [
            'unsubscribeLink' => [
                'required',
                'url',
                'max:255'
                ]
            ];

        return $validate;
    }
}
