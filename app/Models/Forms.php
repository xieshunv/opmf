<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forms extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'forms';
    protected $guarded = [];

    protected $casts = [
        'list_views' => 'json'
    ];

    public function items()
    {
        return $this->hasMany(FormItem::class, 'form_id', 'id')->orderBy('sequence','asc');
    }
}
