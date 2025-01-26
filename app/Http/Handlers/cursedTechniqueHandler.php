<?php

namespace App\Http\Handlers;

use App\Http\Controllers\cursedTechniqueControllers\GetAllCharacterCursedTechnique;
use App\Http\Controllers\cursedTechniqueControllers\GetAllCharacterCursedTechniqueId;
use App\Http\Controllers\cursedTechniqueControllers\GetCharacterCursedTechniqueById;
use App\Http\Controllers\cursedTechniqueControllers\DeleteCharacterCursedTechnique;
use App\Http\Controllers\cursedTechniqueControllers\UpdateCharacterCursedTechnique;
use App\Http\Controllers\cursedTechniqueControllers\CreateCharacterCursedTechnique;
use Illuminate\Http\Request;

class cursedTechniqueHandler
{
    protected $getAll;
    protected $getById;
    protected $create;
    protected $update;
    protected $delete;
    
    public function __construct(
        GetAllCharacterCursedTechnique $getAll,
        GetAllCharacterCursedTechniqueId $getAllId,
        GetCharacterCursedTechniqueById $getById,
        CreateCharacterCursedTechnique $create,
        UpdateCharacterCursedTechnique $update,
        DeleteCharacterCursedTechnique $delete
    ) 
    {
        $this->getAll = $getAll;
        $this->getAllId = $getAllId;
        $this->getById = $getById;
        $this->create = $create;
        $this->update = $update;
        $this->updatePartial = $updatePartial;
        $this->delete = $delete;
    }

    public function getAll() { return $this->getAll->getAll(); }
    public function getAllId() { return $this->getAllId->getAllId(); }
    public function getById($id) { return $this->getById->getById($id); }
    public function create(Request $request) { return $this->create->create($request); }
    public function update(Request $request, $id) { return $this->update->update($request, $id); }
    public function delete($id) { return $this->delete->delete($id); }
}
