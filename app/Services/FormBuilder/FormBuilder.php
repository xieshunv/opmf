<?php


namespace App\Services\FormBuilder {

    use FormItemFactory;
    use Illuminate\Database\Eloquent\Collection;

    class FormBuilder
    {
        public static function editHtml($params, $data = [])
        {
            $formItemFactory = app()->make('FormItemFactory');

            $formItemList = [];
            foreach ($params as $param) {
                $param = self::ResolveParamsData($param);
                if (!count($param)) {
                    continue;
                }

                $value = $data[$param['name']] ?? '';
                $param['value'] = $value;

                if ($param['type'] == 'checkbox') {
                    $param["name"] = $param['name'].'[]';
                }

                $formItemList[] = $formItemFactory
                    ->getItem($param['type'], $param)
                    ->editBlock();
            }
            return implode('', $formItemList);
        }

        public static function detailHtml($params, $data = [])
        {
            $formItemFactory = app()->make('FormItemFactory');
            $formItemList = [];
            foreach ($params as $param) {
                $param = self::ResolveParamsData($param);
                if (!count($param)) {
                    continue;
                }

                $value = $data[$param['name']] ?? '';
                $param['value'] = $value;
                if ($param['type'] == 'checkbox') {
                    /** @var TYPE_NAME $param */
                    $param['name'] = $param['name'].'[]';
                }

                $formItemList[] = $formItemFactory
                    ->getItem($param['type'], $param)
                    ->detailBlock();
            }
            return implode('', $formItemList);
        }

        private static function ResolveParamsData($params): array
        {
            if ($params instanceof Collection) {
                $params = $params->toArray();
            }

            return [
                'id' => array_get($params, 'key') ?? '',
                'name' => array_get($params, 'key') ?? '',
                'display_name' => array_get($params, 'display') ?? '',
                'type' => array_get($params, 'type') ?? 'text',
                'li_class' => array_get($params, 'li_class') ?? 'col-md-6',
                'require' => array_get($params, 'param.require') ?? 0,
                'step' => array_get($params, 'param.step') ?? '',
                'seconds' => array_get($params, 'param.seconds') ?? 0,
                'placeholder' => array_get($params, 'param.placeholder') ?? '',
                'dynamic_options' => array_get($params, 'param.dynamic_options') ?? '',
                'options' => array_get($params, 'param.options') ?? [],
                'tips' => array_get($params, 'param.tips') ?? '',
                'item_id' => array_get($params, 'item_id') ?? '',
                'form_id' => array_get($params, 'form_id') ?? '',
            ];
        }
    }
}
