<?php
/**
 * ==============================================
 * 表单管理
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2021 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021/4/3 9:42 下午
 */
namespace App\Http\Controllers\Pm;

use App\Repositories\Pm\FormRepositories;
use Illuminate\Support\Facades\Log;

class FormController extends BasePmController
{
    private $formRep;

    public function __construct()
    {
        parent::__construct();
        $this->formRep = app(FormRepositories::class);
    }

    /**
     * 列表页
     */
    public function index()
    {
        //获取参数
        $filter=[];
        $filter['title'] = request()->get('title', '');

        //获取数据
        try {
            $list = $this->formRep->getAllForms($filter);
            $data = [];
            $data['list'] = $list;
            $data['filter'] = $filter;
        } catch (\Exception $e) {
            Log::info('[FormController] index error', [
                'messages' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }

        return view('pm.form.index', $data);
    }

}
