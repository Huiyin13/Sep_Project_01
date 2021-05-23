<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rider extends Model
{
    use HasFactory;

    protected $guard = 'rider';

    protected $fillable =[
        'Rider_Name', 'Rider_IC', 'Rider_Email', 'Rider_Phone', 'Rider_Address', 'Rider_IC_photo', 'Rider_Licence', 'Rider_Password',
    ];

    protected $hidden = [
        'Rider_Password', 'remember_token',
    ];
}
