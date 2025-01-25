<?php

namespace App\Http\Handlers;

use App\Http\Controllers\affiliationControllers\GetAllAffiliations;
use App\Http\Controllers\affiliationControllers\GetAffiliationsById;
use App\Http\Controllers\affiliationControllers\DeleteAffiliations;
use App\Http\Controllers\affiliationControllers\UpdateAffiliations;
use App\Http\Controllers\affiliationControllers\CreateAffiliations;
use App\Http\Controllers\affiliationControllers\UpdatePartialAffiliations;
use Illuminate\Http\Request;

class affiliationHandler
{
    protected $getAll;
    protected $getById;
    protected $create;
    protected $update;
    protected $updatePartial;
    protected $delete;

    public function __construct(
        GetAllAffiliations $getAll,
        GetAffiliationsById $getById,
        CreateAffiliations $create,
        UpdateAffiliations $update,
        UpdatePartialAffiliations $updatePartial,
        DeleteAffiliations $delete
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
