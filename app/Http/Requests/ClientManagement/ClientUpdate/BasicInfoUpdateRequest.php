<?php

namespace App\Http\Requests\ClientManagement\ClientUpdate;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class BasicInfoUpdateRequest extends BaseRequest
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
        return [
            'client_status_id'          => 'required|exists:client_statuses,client_status_id',
            'client_code'               => 'required|integer|min:1|unique:clients,client_code,'.$this->client_id.',client_id',
            'client_name'               => 'required|string|max:100|unique:clients,client_name,'.$this->client_id.',client_id',
            'client_postal_code'        => 'nullable|string|max:8',
            'prefecture_id'             => 'nullable|exists:prefectures,prefecture_id',
            'client_address'            => 'nullable|string|max:255',
            'client_tel'                => 'nullable|string|max:13',
            'representative_name'       => 'nullable|string|max:20',
            'company_type_id'           => 'required|exists:company_types,company_type_id',
        ];
    }

    public function messages()
    {
        return parent::messages();
    }

    public function attributes()
    {
        return parent::attributes();
    }
}