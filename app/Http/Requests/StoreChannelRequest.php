<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChannelRequest extends FormRequest
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
            'name'        => 'required|string|max:55|unique:channels,name',
            'description' => 'nullable|string|max:10000',
            'logo_path'   => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }

    /**
     * Create a channel for the authenticated user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(){
        return $this->user()->createChannel($this->only([
            'name', 'description', 'logo_path'
        ]));
    }
}
