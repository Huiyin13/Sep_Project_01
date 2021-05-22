<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $guard = 'customer';

    protected $fillable =[
        'Customer_Name', 'Customer_IC', 'Customer_Email', 'Customer_Phone', 'Customer_Address', 'Customer_Password',
    ];

    protected $hidden = [
        'Customer_Password', 'remember_token',
    ];
}
