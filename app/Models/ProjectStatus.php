<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_status';

    public const DRAFT_STATUS = 'draft';
    public const AUDIT_STATUS = 'audit';
    public const ING_STATUS = 'ing';
    public const FINISH_STATUS = 'finish';
    public const FAIL_STATUS = 'fail';

    public function program()
    {
        $this->belongsTo(Program::class);
    }
}
