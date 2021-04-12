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
 * @date:       2021/4/7 11:08 下午
 */

namespace App\Repositories\Pm;

use App\Models\FormItem;
use App\Repositories\BaseRepositories;

class ItemRepositories extends BaseRepositories
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取单个item
     * @param  array  $map
     * @return bool
     */
    public function getOneItem(int $id)
    {
        $formData = FormItem::where(['id' => $id])->first()->toArray();
        $item = $formData['data'];
        $item['sequence'] = $formData['sequence'];
        $item['related_contact'] = $formData['related_contact'];

        return $item;
    }

    public function getFieldTypesAll()
    {
        return FormItem::getFieldTypes();
    }

    /**
     * 保存更新 Item
     */
    public function saveOrUpdateItem(array $data = [])
    {
        $key = str_replace([' ', '　'], '_', $data['key']);
        $display = $data['display'];
        $type = $data['type'];
        $item_data = [
            'key' => $key,
            'display' => $display,
            'li_class' => $data['li_class'],
            'type' => $type,
            'param' => [
                'require' => $data['param_require'],
                'placeholder' => $data['param_placeholder'],
                'limit_type' => $data['param_limit_type'],
                'limit_size' => $data['param_limit_size'],
                'with_other' => $data['param_with_other'],
                'dynamic_options' => $data['param_dynamic_options'],
                'ajax_link' => $data['param_ajax_link'],
                'options' => $data['options_list'],
                'tips' => $data['tips'],
                'disable_sort' => $data['param_disable_sort'],
                'default_value' => $data['default_value'],
                'max_value' => $data['max_value'],
                'min_value' => $data['min_value'],
                'seconds' => $data['seconds'],
                'step' => $data['step'],
            ],
            'hidden' => [
                'edit' => $data['hidden_edit'],
                'detail' => $data['hidden_detail'],
            ],
            'link' => [
                'type' => $data['link_type'],
                'column' => $data['link_column'],
            ],
            'icon_link' => [
                'suffix_icon' => $data['icon_link_suffix_icon'],
                'type' => $data['icon_link_type'],
                'column' => $data['icon_link_column'],
            ],
            'question_idx' => $data['question_idx'],
            'display_colspan' => $data['display_colspan'],
            'search_disable' => $data['search_disable'],
            'search_type' => $data['search_type'],
            'field_xeditable' => $data['field_xeditable'],
        ];

        if ($data['options_list']) {
            if (isJson($data['options_list'])) {
                $item_data['param']['options'] = json_decode($data['options_list'], true);
            } else {
                $option_values = explode(
                    ',',
                    str_replace(
                        [' ', '"', '\'', '，', '：'],
                        ['', '', '', ',', ':'],
                        $data['options_list']
                    )
                );
                $item_data['param']['options'] = $option_values;
            }
        }

        if ($type == 'group') {
            $goptions = [];
            if ($data['group_fixed_first_columns']) {
                $item_data['group']['fixed_first_columns'] = explode(
                    ',',
                    str_replace(
                        [' ', '"', '\'', '，'],
                        ['', '', '', ','],
                        $data['group_fixed_first_columns']
                    )
                );
                $goptions[] = ['key' => '_first_', 'display' => '', 'type' => 'static', 'class' => 'col-2'];
            }

            for ($i = 0; $i < count($data['group_options_group_key']); $i++) {
                $keys = $data['group_options_group_key'];
                if (!isset($keys[$i])) {
                    continue;
                }
                $op = [
                    'key' => $keys[$i],
                    'display' => $data['group_options_group_display'][$i],
                    'type' => $data['group_options_group_type'][$i],
                    'class' => $data['group_options_group_class'][$i] ?? 'col-2',
                ];

                if ($op['type'] == 'select') {
                    $op['options'] = explode(
                        ',',
                        str_replace(
                            [' ', '"', '\'', '，'],
                            ['', '', '', ','],
                            $data['group_options_group_options'][$i]
                        )
                    );
                }

                $goptions[] = $op;
            }
            $item_data['group']['options'] = $goptions;
        }

        $sequence = intval($data['sequence']);

        if (!$sequence) {
            $sequence = intval(FormItem::where(['form_id' => $data['form_id']])->max('sequence')) + 10;
        }

        $new_item = [
            'form_id' => $data['form_id'],
            'key' => $key,
            'data' => json_encode($item_data),
            'related_contact' => $data['related_contact'],
            'sequence' => $sequence,
        ];

        if (isset($data['item_id']) && !empty($data['item_id'])) {
            $ret = FormItem::where(['id' => $data['item_id']])->update($new_item);
            $item_id = $data['item_id'];
        } else {
            $item_id = FormItem::query()->insertGetId($new_item);
        }

        $item = FormItem::query()->find($item_id);

        $new_data = $item->data;
        $new_data['item_id'] = $item_id;
        $new_data['form_id'] = $data['form_id'];
        $item->data = $new_data;
        $item->save();

        return $item->toArray();
    }

    /**
     * 删除单个item
     * @param  array  $map
     * @return bool
     */
    public function deleteOneItem(array $map = []): bool
    {
        return FormItem::where(['id' => $map['item_id']])->delete();
    }
}
