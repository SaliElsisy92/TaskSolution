<?php

namespace Modules\BlogModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name','photo'];
    public function departement()
    {
        return $this->belongsToMany('Modules\BlogModule\Entities\Departement','blog-dep','blogid','depid');
    }
}
