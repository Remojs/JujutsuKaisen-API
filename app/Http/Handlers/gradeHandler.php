<?php

namespace App\Http\Handlers;

use App\Http\Controllers\gradeControllers\GetAllGrades;
use App\Http\Controllers\gradeControllers\GetGradesById;
use App\Http\Controllers\gradeControllers\DeleteGrades;
use App\Http\Controllers\gradeControllers\UpdateGrades;
use App\Http\Controllers\gradeControllers\CreateGrades;
use App\Http\Controllers\gradeControllers\UpdatePartialGrades;
use Illuminate\Http\Request;

class gradeHandler
{
    protected $getAll;
    protected $getById;
    protected $create;
    protected $update;
    protected $updatePartial;
    protected $delete;

    public function __construct(
        GetAllGrades $getAll,
        GetGradesById $getById,
        CreateGrades $create,
        UpdateGrades $update,
        UpdatePartialGrades $updatePartial,
        DeleteGrades $delete
    ) 
    {
        $this->getAll = $getAll;
        $this->getById = $getById;
        $this->create = $create;
        $this->update = $update;
        $this->updatePartial = $updatePartial;
        $this->delete = $delete;
    }

    public function getAll() { return $this->getAll->getAll(); }
    public function getById($id) { return $this->getById->getById($id); }
    public function create(Request $request) { return $this->create->create($request); }
    public function update(Request $request, $id) { return $this->update->update($request, $id); }
    public function updatePartial(Request $request, $id) { return $this->updatePartial->updatePartial($request, $id); }
    public function delete($id) { return $this->delete->delete($id); }
}
