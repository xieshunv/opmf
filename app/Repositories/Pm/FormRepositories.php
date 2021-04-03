<?php
/**
 * ==============================================
 * pm端 表单相关操作
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/3 23:06 下午
 */

namespace App\Repositories\Pm;

use App\Models\Forms;
use App\Message\Tips;
use Carbon\Carbon;
use App\Repositories\BaseRepositories;
use App\Exceptions\OpmfException;

class FormRepositories extends BaseRepositories
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllForms(array $map)
    {
        $list = Forms::query()
            ->select('*')
            ->when(isset($map['parent_id']), function ($q) use ($map) {
                return $q->where('parent_id', $map['parent_id']);
            })
            ->when(!empty($map['title']), function ($q) use ($map) {
                return $q->where('title', 'like', '%' . $map['title'] . '%');
            })
            ->when(isset($map['program_id']), function ($q) use ($map) {
                return $q->where(['module' => 'program', 'module_id' => $map['program_id']]);
            })
            ->orderBy('id','desc')
            ->paginate(self::SIZE);

        return $list;
    }

}
