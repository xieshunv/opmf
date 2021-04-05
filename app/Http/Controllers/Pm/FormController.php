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
use App\Repositories\Pm\AuxiliaryRepositories;
use App\Repositories\Pm\ProgramRepository;
use App\Exceptions\OpmfException;
use Illuminate\Support\Facades\Log;
use App\Message\Tips;


class FormController extends BasePmController
{
    /**
     * @var FormRepositories
     */
    private $formRep;

    /**
     * @var AuxiliaryRepositories
     */
    private $auxRep;

    /**
     * @var ProgramRepository
     */
    private $program;

    public function __construct(
        FormRepositories $formRep,
        AuxiliaryRepositories $auxRep,
        ProgramRepository $program
    ){
        parent::__construct();
        $this->formRep = $formRep;
        $this->auxRep = $auxRep;
        $this->program = $program;
    }

    /**
     * 列表页
     */
    public function index()
    {
        //获取参数
        $filter=[];
        $filter = ['parent_id' => 0];
        $filter['title'] = request()->get('title', '');

        //获取数据
        $data = [];
        try {
            $list = $this->formRep->getAllForms($filter);
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

    /**
     * 编辑
     */
    public function formEdit()
    {
        //主表单信息
        $masterFormSelect = $this->auxRep->getMasterForm();
        //获取有效的Program
        $programInfo = $this->auxRep->getProgram();
        //获取表单
        $form = [];
        $formId = request()->get('form_id');
        if (!empty($formId)) {
            $form = $this->formRep->getFormDetails(['id'=>$formId]);
        }

        $data = [
            'master_form_select' =>$masterFormSelect,
            'program_info' =>$programInfo,
            'form'=>$form
        ];

        return view('pm.form.edit', $data);
    }

    /**
     * 通过Program_id获取项目期ID
     */
    public function ajaxGetProgramCircleId()
    {
        //接收参数
        $programId = request()->get('program_id',0);
        if (empty($programId)) {
            return response()->json([
                'code'=>400,
                'data'=>[],
                'messages'=>Tips::PARAM_ERR.':program_id'
            ]);
        }
        try{
            $ret = $this->program->getCurrentCircle($programId);
            return response()->json([
                'code'=>200,
                'data'=>$ret,
                'messages'=>Tips::AJAX_SUCCESS
            ]);
        } catch (OpmfException $e) {
            $messages = $e->getMessage();
            Log::warning('[Pm FormController] ajaxGetProgramCircleId warning', [
                'messages' => $messages,
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return response()->json([
                'code'=>400,
                'data'=>[],
                'messages'=>$messages
            ]);
        }
    }
    /**
     * 保存
     */
    public function formSave()
    {
        $ref = Request()->server('HTTP_REFERER');
        //接收参数
        $data = request()->all();
        //验证规则
        $rules = ['module' => 'required', 'title' => 'required'];
        //提示信息
        $messages = [
            'module.*' => Tips::FORM_MODULE_EMPTY,
            'title.*' => Tips::FORM_TITLE_EMPTY,
        ];

        $checkRet = $this->paramValidate($data, $rules, $messages, $errorMsg);
        if (false === $checkRet) {
            session()->put('error', $errorMsg);
            $ref = Request()->server('HTTP_REFERER');
            return redirect($ref);
        }

        try {
            $this->formRep->saveOrUpdateForm($data);
            session()->put('success', Tips::SAVE_SUCCESS);
            return redirect('/form');
        } catch (OpmfException $e) {
            $messages = $e->getMessage();
            Log::warning('[Pm UserController] doLogin warning', [
                'messages' => $messages,
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            session()->put('error', $errorMsg);
            return redirect($ref);
        }
    }

}
