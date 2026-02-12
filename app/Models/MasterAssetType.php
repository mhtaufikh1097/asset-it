<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterAssetType extends Model
{
    public $timestamps = true;
    
    protected $table = 'master_asset_type';
    protected $primaryKey = 'id_type';

    protected $fillable = [
        'id_category',
        'code_type',
        'name_type',
        'keterangan',
        'is_active',
    ];
}
