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
use App\Repositories\Pm\FormRepositories;

class ItemsController extends BasePmController
{
    /**
     * @var FormRepositories
     */
    private $formRep;

    public function __construct(FormRepositories $formRep)
    {
        $this->formRep = $formRep;
    }

    /**
     * 表单字段列表
     */
    public function index()
    {
        $form_id = request()->get('form_id',0);
        if (empty($form_id)) {
            return redirect('/form');
        }

        $form = $this->formRep->getFormDetails(['id'=>$form_id]);
        $data = [
            'form'=>$form
        ];
        return view('pm.item.index',$data);
    }

    public function edit()
    {

    }

    public function save()
    {

    }

    public function delete()
    {

    }
}
