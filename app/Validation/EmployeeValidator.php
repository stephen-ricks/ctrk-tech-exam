<?php

namespace App\Validation;

class EmployeeValidator
{
    private $rules = [
        'employee_id' => 'int|required',
        'last_name' => 'string|required',
        'first_name' => 'string|required',
        'title' => 'string|required',
        'title_of_courtesy' => 'string|required',
        'birth_date' => 'date_format:Y-m-d|required',
        'hire_date' => 'date_format:Y-m-d|required',
        'address' => 'string|required',
        'city' => 'string|required',
        'region' => 'string|nullable',
        'postal_code' => 'string|required',
        'country' => 'string|required',
        'home_phone' => 'string|required',
        'extension' => 'string|required',
        'photo' => 'image|filled|mimes:bmp',
        'notes' => 'string|required',
        'reports_to' => 'int|nullable'
    ];

    private $updateRules = [
        'last_name' => 'string|sometimes',
        'first_name' => 'string|sometimes',
        'title' => 'string|sometimes',
        'title_of_courtesy' => 'string|sometimes',
        'birth_date' => 'date_format:Y-m-d|sometimes',
        'hire_date' => 'date_format:Y-m-d|sometimes',
        'address' => 'string|sometimes',
        'city' => 'string|sometimes',
        'region' => 'string|nullable',
        'postal_code' => 'string|sometimes',
        'country' => 'string|sometimes',
        'home_phone' => 'string|sometimes',
        'extension' => 'string|sometimes',
        'photo' => 'image|filled|mimes:bmp',
        'notes' => 'string|sometimes',
        'reports_to' => 'int|nullable'
    ];

    public function getRules()
    {
        return $this->rules;
    }

    public function getUpdateRules()
    {
        return $this->updateRules;
    }
}