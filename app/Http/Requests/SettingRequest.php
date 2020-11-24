<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'shop_name' => 'required|string|unique:settings,shop_name,' . $this->id,
            'address' => 'required',
            'pan_no' => 'nullable|max:9|min:9|unique:settings,pan_no,' . $this->id,
            'contact_no' => 'required|max:14|min:10|unique:settings,contact_no,' . $this->id,
            'date_type' => 'required|in:0,1'
        ];
    }
}
