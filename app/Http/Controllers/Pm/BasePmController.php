<?php

/**
 * ==============================================
 * 管理端 Base
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshun <xieshun@lingxi360.com>
 * @copyright： @2021 http://www.lingxi360.com.com/
 * @version：   v1.0.0
 * @date:       2021-02-24 21:20
 */

namespace App\Http\Controllers\Pm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class BasePmController extends Controller
{
    public $ref;
    public function __construct()
    {
        $this->ref = Request()->server('HTTP_REFERER');
    }
}




