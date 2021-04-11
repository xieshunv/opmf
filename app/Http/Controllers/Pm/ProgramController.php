<?php

/**
 * ==============================================
 * 文件描述
 * ----------------------------------------------
 * PHP version 7 灵析
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/11 9:57 下午
 */

declare(strict_types=1);

namespace App\Http\Controllers\Pm;

use App\Http\Controllers\Pm\BasePmController;
use App\Repositories\Pm\ProgramRepositories;

class ProgramController extends BasePmController
{
    /**
     * @var ProgramRepository
     */
    private $programRep;

    public function __construct(ProgramRepositories $programRep)
    {
        $this->programRep = $programRep;
    }

    public function index()
    {
        $list = $this->programRep->getAllProgram([]);
        $data = [
            'list' => $list,
            'filter' => []
        ];

        return view('pm.program.index', $data);
    }
}
