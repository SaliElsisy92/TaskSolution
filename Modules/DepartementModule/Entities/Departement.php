<?php

namespace Modules\DepartementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['name'];

    public function Bolg()
    {
        return $this->belongsToMany('Modules\BlogModule\Entities\Blog','blog-dep','depid','blogid');
    }
}
