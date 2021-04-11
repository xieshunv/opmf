<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 项目周期
class ProgramCircle extends Model
{
    public const DISABLED = 0;
    public const ENABLED = 1;

    public $timestamps = false;

    protected $table = 'program_circles';

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
