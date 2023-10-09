<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $table = 'employees';

    protected $fillable = [
        'name',
        'branch_id',
        'email',
        'designation',
        'emergency_contact',
        'contact',
        'blood_group',
        'nid',
        'dob',
        'joining_date',
        'image',
        'employee_id',
        'qrcode',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
