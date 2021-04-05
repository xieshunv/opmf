<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_status';

    const DRAFT_STATUS = 'draft';
    const AUDIT_STATUS = 'audit';
    const ING_STATUS = 'ing';
    const FINISH_STATUS = 'finish';
    const FAIL_STATUS = 'fail';

    public function program()
    {
        $this->belongsTo(Program::class);
    }
}
