<?php

namespace App\Http\Handlers;

use App\Http\Controllers\cursedTechniqueControllers\GetAllCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\GetCursedTechniquesById;
use App\Http\Controllers\cursedTechniqueControllers\DeleteCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\UpdateCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\CreateCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\UpdatePartialCursedTechniques;
use Illuminate\Http\Request;

class cursedTechniqueHandler
{
    protected $getAll;
    protected $getById;
    protected $create;
    protected $update;
    protected $updatePartial;
    protected $delete;

    public function __construct(
        GetAllCursedTechniques $getAll,
        GetCursedTechniquesById $getById,
        CreateCursedTechniques $create,
        UpdateCursedTechniques $update,
        UpdatePartialCursedTechniques $updatePartial,
        DeleteCursedTechniques $delete
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
