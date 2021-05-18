<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manageRepairStatusModel extends Model
{
    use HasFactory;
    public $table = "requestdetails";
    protected $primaryKey = 'OrderID';
}
