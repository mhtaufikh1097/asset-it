<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    use HasFactory;

    protected $table = 'master_category';
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'name_category',
        'keterangan',
        'is_active',
    ];
}
