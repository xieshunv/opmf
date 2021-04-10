<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormItem extends Model
{
    use SoftDeletes;

    protected $table = 'form_items';
    protected $primaryKey = 'id'; //主键
    protected $datas = ['deleted_at'];

    protected $casts = [
        'data' => 'json'
    ];

    protected $guarded = [];

    /**
     * 字段属性
     */
    private static $fieldTypes = [
        'text' => 'text',
        'select' => 'select',
        'password' => 'password',
        'number' => 'number',
        'checkbox' => 'checkbox',
        'radio' => 'radio',
        'file' => 'file',
        'date' => 'date',
        'textarea' => 'textarea',
        'address' => 'address',
        'editor' => 'editor',
        'split' => 'split',
        'group' => 'group',
        'hidden' => 'hidden',
    ];

    public static function getFieldTypes($type = '')
    {
        return $type ?  self::$fieldTypes[$type] : self::$fieldTypes;
    }
}
