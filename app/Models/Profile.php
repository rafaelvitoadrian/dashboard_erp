<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'profile';
    protected $fillable=[
        'profile_name',
        'user_id',
        'country_id',
        'gender',
        'place_of_birth',
        'country_of_birth',
        'birthday',
        'emergency_contact',
        'emergency_phone',
        'notes',
        'address',
        'street',
        'street2',
        'zip',
        'city',
        'state_id',
        'work_phone',
        'mobile_phone',
        'work_email',
        'work_location',
        'photo',
        'state'
    ];
}
