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
use App\Models\FormItem;
use App\Repositories\BaseRepositories;
use App\Exceptions\OpmfException;

class FormRepositories extends BaseRepositories
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 表单列表
     * @param array $map
     * @return
     */
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
            ->orderBy('id', 'desc')
            ->paginate(self::SIZE);
        foreach ($list as &$value) {
            $where = ['parent_id' => $value->id];
            $subItems = Forms::select('*')
                ->where($where)
                ->get();
            if ($subItems) {
                $value->form_blocks = $subItems;
            }
        }

        return $list;
    }

    /**
     * 获取表单
     */
    public function getFormDetails(array $map)
    {
        $form = Forms::query()
            ->select('*')
            ->when(isset($map['id']), function ($q) use ($map) {
                return $q->where('id', $map['id']);
            })
            ->when(isset($map['program_id']), function ($q) use ($map) {
                return $q->where(['module' => 'program', 'module_id' => $map['program_id']]);
            })
            ->first();

        return $form;
    }

    /**
     * 保存更新 Form
     * @return int
     */
    public function saveOrUpdateForm(array $data = []): int
    {
        $lvs = [];
        if (!empty($data['list_views_group_id']) && !empty($data['list_views_group_fields'])) {
            foreach ($data['list_views_group_id'] as $k => $id) {
                $_f = str_replace([' ', '，'], ['', ','], $data['list_views_group_fields'][$k]);
                if ($_f) {
                    $lvs[$id] = explode(',', $_f);
                }
            }
        }

        $data['list_views'] = json_encode($lvs);

        unset($data['list_views_group_id']);
        unset($data['list_views_group_fields']);

        $id = $data['id'];
        unset($data['id']);
        if ($id) {
            $ret = Forms::where(['id' => $id])->update($data);
        } else {
            $ret = Forms::insert($data);
        }
        return $ret;
    }
}
