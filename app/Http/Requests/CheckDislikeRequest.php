<?php

namespace App\Http\Requests;

use App\Models\Posts_likes;
use Illuminate\Foundation\Http\FormRequest;

class CheckDislikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user_exists = Posts_likes::where('ip_address', $this->ip())->exists();
        $is_exists = Posts_likes::where('ip_address', $this->ip())
            ->where('post_id', $this->route('dislike'))->exists();

        if ($is_exists){
            return false;
        }
        if (!$is_exists || !$user_exists){
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
