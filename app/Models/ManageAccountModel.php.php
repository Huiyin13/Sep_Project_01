<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAccountModel.php extends Model
{
    use HasFactory;
    public $table1 = "customers";
    protected $primaryKey1 = 'Customer_ID';
    public $table2 = "riders";
    protected $primaryKey2 = 'Rider_ID';
    public $table3 = "staffs";
    protected $primaryKe3y = 'Staff_ID';
}
