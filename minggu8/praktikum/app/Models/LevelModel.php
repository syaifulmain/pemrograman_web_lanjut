<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';

    protected $fillable = [
        'level_kode',
        'level_nama'
    ];

    public function user(): hasMany
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
