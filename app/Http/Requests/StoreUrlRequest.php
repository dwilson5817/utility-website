<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUrlRequest extends FormRequest
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
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        // Get all the existing validation data from the form
        $validationData = $this->all();

        // Join the protocol and the host together to get the full URL so we can check it is accessible
        $validationData['full_url'] = $validationData['protocol'] . $validationData['host'];

        // Return the new validation data
        return $validationData;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_url' => 'required|active_url'
        ];
    }
}
