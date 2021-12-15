<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Admin extends Model
{
    use HasFactory;
    protected  $table = 'users';
    protected $guarded = [];


    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('role', '!=', '0');
        });
    }

}
