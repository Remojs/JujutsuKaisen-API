<?php

namespace App\Http\Handlers;

use App\Http\Controllers\characterControllers\GetAllCharacters;
use App\Http\Controllers\characterControllers\GetCharactersById;
use App\Http\Controllers\characterControllers\DeleteCharacters;
use App\Http\Controllers\characterControllers\UpdateCharacters;
use App\Http\Controllers\characterControllers\CreateCharacters;
use App\Http\Controllers\characterControllers\UpdatePartialCharacters;
use Illuminate\Http\Request;

class characterHandler
{
    protected $getAll;
    protected $getById;
    protected $create;
    protected $update;
    protected $updatePartial;
    protected $delete;

    public function __construct(
        GetAllCharacters $getAll,
        GetCharactersById $getById,
        CreateCharacters $create,
        UpdateCharacters $update,
        UpdatePartialCharacters $updatePartial,
        DeleteCharacters $delete
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
