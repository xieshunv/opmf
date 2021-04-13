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
use App\Message\Tips;

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

    /**
     * 编辑
     */
    public function edit()
    {
        $data = [];
        //获取参数
        $id = (int)request()->get('id', 0);
        if ($id) {
            $data = $this->programRep->getOneProgram($id);
        }

        return view(
            "pm.program.edit",
            [
                'data' => $data,
            ]
        );
    }

    /**
     * 保存
     */
    public function save()
    {
        $all = request()->request->all();
        $ret = $this->programRep->saveProgram($all);
        if (!$ret) {
            request()->session()->put('error', Tips::SAVE_ERROR);
        } else {
            request()->session()->put('success', Tips::SAVE_SUCCESS);
        }

        return redirect('/program');
    }

    /**
     * 项目期
     */
    public function circle()
    {
        $programId = (int)request()->get('program_id', 0);
        $filter = [];
        $filter['program_id'] = $programId;

        //获取数据
        $programData = $this->programRep->getAllStage($filter);
        $data['list'] = $programData;

        $data = [
            'list' => $programData,
            'filter' => $filter
        ];
        return view("pm.program.circle", $data);
    }

    public function addCircle()
    {
        $id = (int)request()->get('id', '0');
        $programId = (int)request()->get('program_id', 0);

        $circle = [];
        if ($id) {
            $circle = $this->programRep->getCurrentCircle(['id' => $id]);
        }

        $circle['program_id'] = $programId;
        $data = [
            'title' => '项目期管理',
            'circle' => $circle
        ];

        $html = view('pm.program.add_circle', $data)->render();
        return response()->json(['data' => $html]);
    }

    public function saveCircle()
    {
        $data = request()->all();

        $result = $this->programRep->saveStage($data);

        if ($result) {
            session()->put('success', '信息保存成功');
        }

        return redirect('/circle?program_id='.$data['program_id']);
    }
}
