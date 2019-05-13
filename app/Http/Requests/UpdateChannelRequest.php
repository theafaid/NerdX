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
//            'name' => 'required|string|max:55|unique:channels,name,'. $this->route('channel')->id,
//            'slug' => 'required|string|max:55|unique:channels,slug,'. $this->route('channel')->id,
//            'description' => 'required|string|max:1000',
            'channel_logo' => 'image|nullable|mimes:png,jpg,jpeg'
        ];
    }

    public function persist($channel){

        if($this->channel_logo){
            $channel_logo = request()->file('channel_logo')->store('channels');
        }else{
            $channel_logo = $channel->logo_path;
        }


        $channel->update([
//            'name' => $this->name,
//            'slug' => $this->slug,
//            'description' => $this->description,
            'logo_path' => $channel_logo
        ]);
    }
}
