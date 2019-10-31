<?php
namespace Modules\DepartementModule\Repository;
use Modules\DepartementModule\Entities\Departement;

class DepartementRepository
{
    public function find()
    {
        $Deps=Departement::find();
        return $Deps;
    }
}
