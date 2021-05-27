<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickUpDeliveryModel extends Model
{
    use HasFactory;
    public $table = "PickupDelivers";
    protected $primaryKey = 'PickUpDeliver_ID';
}
