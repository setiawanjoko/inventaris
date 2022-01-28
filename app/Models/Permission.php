<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Const used for gate
    public const IS_RESTRICTED = 0;
    public const IS_ADMIN = 1;
    public const IS_OPERATOR = 2;
    public const IS_USER = 3;

    public function users() {
        return $this->hasMany(User::class, 'permission_id', 'id');
    }
}
