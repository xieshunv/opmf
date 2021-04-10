<?php
/**
 * ==============================================
 * 表单字段字段
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/5 3:48 下午
 */

namespace App\Http\Controllers\Pm;

use App\Http\Controllers\Pm\BasePmController;
use App\Message\Tips;
use App\Repositories\Pm\FormRepositories;
use App\Repositories\Pm\ItemRepositories;

class ItemsController extends BasePmController
{
    /**
     * @var FormRepositories
     */
    private $formRep;

    /**
     * @var ItemRepositories
     */
    private $item;

    public function __construct(FormRepositories $formRep, ItemRepositories $item)
    {
        parent::__construct();
        $this->formRep = $formRep;
        $this->item = $item;
    }

    /**
     * 表单字段列表
     */
    public function index()
    {
        $form_id = request()->get('form_id', 0);
        if (empty($form_id)) {
            return redirect('/form');
        }

        $form = $this->formRep->getFormDetails(['id' => $form_id]);
        $data = [
            'form' => $form
        ];
        return view('pm.item.index', $data);
    }

    public function edit()
    {
        $data = [];
        //获取参数
        $form_id = request()->get('form_id', 0);
        $item_id = request()->get('item_id', 0);

        if ($item_id) {
            $data['item_id'] = $item_id;
            $itemData = $this->item->getOneItem($item_id);
            $data['item'] = $itemData;
        }

        $formData = $this->formRep->getFormDetails(['id' => $form_id]);
        $data['form_title'] = $formData['title'];
        $data['field_types'] = $this->item->getFieldTypesAll();
        $data['form_id'] = $form_id;

        return view("pm.item.edit", $data);
    }

    public function save()
    {
        $data = request()->all();
        //验证规则
        $rules = ['form_id' => 'required', 'display' => 'required', 'key' => 'required', 'type' => 'required'];
        //提示信息
        $messages = [
            'display.*' => Tips::PARAM_ERR . 'display',
            'key.*' => Tips::PARAM_ERR . 'key',
            'type.*' => Tips::PARAM_ERR . 'type',
            'form_id.*' => Tips::PARAM_ERR . 'form_id'
        ];

        $checkRet = $this->paramValidate($data, $rules, $messages, $errorMsg);
        if (false === $checkRet) {
            session()->put('error', $errorMsg);
            return redirect($this->ref);
        }

        $ret = $this->item->saveOrUpdateItem($data);
        if ($ret) {
            session()->put('success', Tips::SAVE_SUCCESS);
        } else {
            session()->put('error', Tips::SAVE_ERROR);
        }

        if (isset($data['submit_then_new']) && !empty($data['submit_then_new'])) {
            return redirect('/items/edit?form_id=' . $data['form_id']);
        }
        return redirect('/items?form_id=' . $data['form_id']);
    }

    /**
     * 删除表单字段
     * @return
     */
    public function delete()
    {
        //获取参数
        $filter = request()->all();
        //验证规则
        $rules = ['form_id' => 'required', 'item_id' => 'required'];
        //提示信息
        $messages = [
            'item_id.*' => Tips::PARAM_ERR . 'item_id',
            'form_id.*' => Tips::PARAM_ERR . 'form_id'
        ];

        $checkRet = $this->paramValidate($filter, $rules, $messages, $errorMsg);
        if (false === $checkRet) {
            session()->put('error', $errorMsg);
            return redirect($this->ref);
        }

        $ret = $this->item->deleteOneItem($filter);

        if ($ret) {
            session()->put('success', Tips::DELETE_SUCCESS);
        } else {
            session()->put('error', Tips::DELETE_ERROR);
        }
        return redirect('/items?form_id=' . $filter['form_id']);
    }
}
