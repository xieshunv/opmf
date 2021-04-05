<?php
/**
 * ==============================================
 * Program Repository
 * ----------------------------------------------
 * PHP version 7 灵析-项目管理框架
 * ==============================================
 * @category：  PHP
 * @author：    xieshunv <xieshun@lingxi360.cn>
 * @copyright： @2020 http://www.lingxi360.cn/
 * @version：   v1.0.0
 * @date:       2021-04-05 9:54
 */

namespace App\Repositories\Pm;

use App\Repositories\BaseRepositories;
use App\Models\Program;
use App\Models\ProgramCircle;
use App\Models\ProjectStatus;
use Carbon\Carbon;

class ProgramRepository extends BaseRepositories
{
    public function __construct()
    {
    }

    /**
     * @param int $programId
     * @return array
     */
    public function getCurrentCircle(int $programId)
    {
        $circle = ProgramCircle::query()
            ->where('program_id', $programId)
            ->where('is_enabled', ProgramCircle::ENABLED)
            ->first();

        return $circle ? $circle->toArray() : [];
    }


    public function getAllProgram($map)
    {
        $data = Program::query()
            ->select('*')
            ->when(isset($map['parent_id']), function ($q) use ($map) {
                return $q->where('parent_id', $map['parent_id']);
            })
            ->when(isset($map['sort']), function ($q) use ($map) {
                return $q->orderBy($map['sort'][0], $map['sort'][1]);
            })

            ->paginate(self::PAGE_SIZE);

        return $data;
    }

    public function getOneProgram(int $id)
    {
        $data = Program::query()
            ->select('*')
            ->where(['id' => $id])
            ->first()
            ->toArray();

        return $data;
    }

    /**
     * @param $data
     * @return int
     */
    public function saveProgram($data)
    {
        if (isset($data['id']) && !empty($data['id'])) {
            $map = ['id' => $data['id']];
            unset($data['id']);
            return Program::query()->where($map)->update($data);
        } else {
            unset($data['id']);
            return Program::query()->insertGetId($data);
        }
    }

    public function getAllStatus($map)
    {
        $data = ProjectStatus::query()
            ->select('*')
            ->when(isset($map['program_id']), function ($q) use ($map) {
                return $q->where('program_id', $map['program_id']);
            })
            ->when(isset($map['sort']), function ($q) use ($map) {
                return $q->orderBy($map['sort'][0], $map['sort'][1]);
            })
            ->paginate(self::PAGE_SIZE);

        return $data;

    }

    public function getOneStatus(int $id)
    {
        $data = ProjectStatus::query()
            ->select('*')
            ->where(['id' => $id])
            ->first()
            ->toArray();

        return $data;
    }

    public function saveStatus(array $data)
    {
        if (isset($data['status_id']) && !empty($data['status_id'])) {
            $map = ['id' => $data['status_id']];
            unset($data['status_id']);
            ProjectStatus::query()->where($map)->update($data);
        } else {
            unset($data['status_id']);
            return ProjectStatus::query()->insertGetId($data);
        }

    }

    public function getProgramDetailedInfo(int $programId)
    {
        $program = $this->getOneProgram($programId);

        $status = $this->getAllStatus(['program_id' => $programId])->toArray();

        $statusInfo = [];
        if ($status) {
            foreach ($status['data'] as $value) {
                $statusInfo[$value['id']] = $value;
            }
        }

        list($forms, $items) = $this->formRep->getAllItemsByFormId([
            'module' => 'program',
            'module_id' => $programId,
        ]);


        $formsData = $forms->toArray();
        $itemsData = $items->pluck('data')->toArray();

        $formsData['items'] = $itemsData;

        $stage = $this->getCurrentCircle($programId);

        return [
            'program' => $program,
            'status' => $statusInfo,
            'stage' => $stage,
            'form' => $formsData,
        ];
    }



    public function getExceptDraftProgramStatus($programId)
    {
        return ProjectStatus::query()
            ->where('program_id', $programId)
            ->where('step', '!=', ProjectStatus::DRAFT_STATUS)
            ->get()
            ->toArray();
    }

    public function findDraftStatus($programId)
    {
        $status = ProjectStatus::query()
            ->where('program_id', $programId)
            ->where('step', ProjectStatus::DRAFT_STATUS)
            ->first();

        return $status->id;
    }
}
