<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelRequest extends FormRequest
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
            'name' => 'required|string|max:55|unique:channels,name,'. $this->channel_id,
            'slug' => 'required|string|max:55|unique:channels,slug,'. $this->channel_id,
            'description' => 'required|string|max:1000'
//            'icon'
        ];
    }

    public function persist($channel){
        $channel->update($this->only(['name', 'slug', 'description']));
    }
}
