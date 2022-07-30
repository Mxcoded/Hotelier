<?php

namespace App\Repositories;

use App\Models\Module;


class ModuleRepository
{
    protected $module;
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    private function save(Module $module, $user, array $inputs)
    {
        $module->intitule = $inputs['intitule'];
        $module->user_id = $user;
        $module->ue = $inputs['ue'];
        $module->description = $inputs['description'];

        $module->save();
    }

    public function getPaginate($n)
    {
        return $this->module->paginate($n);
    }

    public function store(array $inputs, $user)
    {
        $module = new $this->module;
        $this->save($module, $user, $inputs);
    }

    public function getById($id)
    {
        return $this->module->findOrFail($id);
    }

    public function update($id, array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}