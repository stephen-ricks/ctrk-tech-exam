<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_id';

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'last_name',
        'first_name',
        'title',
        'title_of_courtesy',
        'birth_date',
        'hire_date',
        'address',
        'city',
        'region',
        'postal_code',
        'country',
        'home_phone',
        'extension',
        'photo',
        'notes',
        'reports_to',
        'photo_path',
    ];

    protected $appends = ['type'];

    protected $hidden = ['photo'];

    public function getTypeAttribute()
    {
        return 'employee';
    }

    public function manager()
    {
        return $this->belongsTo('\App\Model\Employee', 'reports_to');
    }
}