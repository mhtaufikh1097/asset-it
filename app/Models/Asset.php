<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'asset';

    protected $primaryKey = 'id';

    protected $fillable = [
        'asset_number',
        'asset_name',
        'category_id',
        'type_id',
        'department_id',
        'part_number',
        'serial_number',
        'model',
        'manufacturer',
        'yom',
        'asset_condition',
        'owner',
        'department',
        'location',
        'assign_to',
    ];
}
