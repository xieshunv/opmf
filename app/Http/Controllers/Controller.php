<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * 参数验证
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function paramValidate(array $data, array $rules, array $messages, &$errorMsg)
    {
        try {
            $validator = Validator::make($data, $rules, $messages);
            $validator->validate();
            return $validator;
        } catch (ValidationException $e) {
            $error = $validator->errors()->all();
            $errorMsg = implode(' <br /> ', $error);

            return false;
        }
    }

    /**
     * 开启维护模式
     */
    protected function openMaintain()
    {
        $this->middleware(function () {
            return response()->view('errors.maintain');
        });
    }
}
