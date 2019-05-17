<?php

namespace App\Http\Requests;

use App\Jobs\UploadImage;
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
        $channelId = $this->route('channel')->id;

        return [
            'name'         => 'required|string|max:55|unique:channels,name,' . $channelId,
            'slug'         => 'required|string|max:55|unique:channels,slug,'. $channelId,
            'description'  => 'required|string|max:1000',
            'logo'         => 'image|nullable|mimes:png,jpg,jpeg',
            'background'   => 'image|nullable|mimes:png,jpg,jpeg'
        ];
    }

    public function persist($channel){

        $channel->update([
            'name'            => $this->name,
            'slug'            => $this->slug,
            'description'     => $this->description,
        ]);

        $images = ['logo' => 'logo_path', 'background' => 'background_path'];

        foreach($images as $requestName => $fieldName){
            if($this->$requestName){

                $fileName = "{$channel->slug}_{$requestName}";

                request()->file($requestName)->storeAs("Upload", $fileName);

                dispatch(new UploadImage($channel, $fileName, $fieldName));
            }
        }
    }

    protected function upload($file, $fileName){
        return $this->file($file)->store(storage_path("public/channels/{$fileName}_{$file}.jpg"));
    }
}
