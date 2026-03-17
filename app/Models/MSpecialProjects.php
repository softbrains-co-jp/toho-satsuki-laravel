<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSpecialProjects extends Model
{
    protected $table = 'm_special_projects';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
