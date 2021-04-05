<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 品牌项目
class Program extends Model
{
    protected $table = 'programs';

    const TEACHER = 700;

    const SCHOOL = 600;

    public function status()
    {
        return $this->hasMany(ProjectStatus::class, 'program_id', 'id');
    }

    // 项目期
    public function circle()
    {
        return $this->hasMany(ProgramCircle::class, 'program_id',  'id');
    }
}
