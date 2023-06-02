<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $employeeId = $this->route('user') ? $this->route('user') : null;
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $employeeId,
            'designation' => 'required|string',
            'salary' => 'nullable|string',
            'joining_date' => 'required|date',
            'date_of_birth' => 'required|date',
            'account_number' => 'nullable|string',
            'phone_one' => 'required|regex:/^\+?\d{1,3}?\s?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/|min:11|max:14|unique:users,phone,' . $employeeId,
            'phone_two' => 'nullable|regex:/^\+?\d{1,3}?\s?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/|min:11|max:14',
            'gender' => ['required', Rule::in([
                'male',
                'female',
                'other'
            ])],
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'religion' => ['required', Rule::in([
                'islam',
                'christian',
                'hindu',
                'buddha',
                'other',
            ])],
            'nid_number' => 'required|numeric|unique:members,nid_number,' . $employeeId,
            'admission_fee' => 'nullable|numeric',
            'service_fee' => 'nullable|numeric',
            'division_id' => 'required|integer|exists:divisions,id',
            'district_id' => 'required|integer|exists:districts,id',
            'upazila_id' => 'required|integer|exists:upazilas,id',
            'current_post_office' => 'required|string',
            'current_village' => 'required|string',
            'permanent_division_id' => 'required|integer|exists:divisions,id',
            'permanent_district_id' => 'required|integer|exists:districts,id',
            'permanent_upazila_id' => 'required|integer|exists:upazilas,id',
            'permanent_post_office' => 'required|string',
            'permanent_village' => 'required|string',
            'employee_image' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'password' => [
                'nullable',
                'string',
                'min:8',             // must be at least 10 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
//                'regex:/[A-Z]/',      // must contain at least one uppercase letter
//                'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/', // must contain a special character
                'confirmed', ],
            'password_confirmation' => 'nullable',
            'role' => 'required',
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'division_id' => 'current division',
            'phone_one' => 'phone',
            'phone_two' => 'alternate phone',
            'district_id' => 'current district',
            'upazila_id' => 'current upazila',
            'permanent_division_id' => 'permanent division',
            'permanent_district_id' => 'permanent district',
            'permanent_upazila_id' => 'permanent upazila',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'division_id.exists' => 'current division field is required',
            'district_id.exists' => 'current district field is required',
            'upazila_id.exists' => 'current upazila field is required',
            'permanent_division_id.exists' => 'permanent division field is required',
            'permanent_district_id.exists' => 'permanent district field is required',
            'permanent_upazila_id.exists' => 'permanent upazila field is required',
        ];
    }
}
