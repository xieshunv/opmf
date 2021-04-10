<?php

/**
 * ==============================================
 * 辅助编辑页面 SELECT 选项
 * ----------------------------------------------
 * PHP version 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/4 11:35 下午
 */

namespace App\Repositories\Pm;

use App\Repositories\BaseRepositories;
use App\Models\Forms;
use App\Models\Program;

class AuxiliaryRepositories extends BaseRepositories
{
    public function __construct()
    {
    }

    /**
     * 查找主表单
     */
    public function getMasterForm()
    {
        $formInfo = Forms::query()
            ->select(['id','title'])
            ->where([
                'parent_id' => 0
            ])
            ->get();
        return $formInfo ? $formInfo->toArray() : [];
    }

    /**
     *获取有效的Program
     */
    public function getProgram()
    {
        $programInfo = Program::query()
            ->select(['id','short_title'])
            ->where([
                'is_enabled' => 1
            ])
            ->get();
        return $programInfo ? $programInfo->toArray() : [];
    }
}
