<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;
    use ModelTree;
    public function informationsTypes()
    {

        return $this->hasMany(InformationsType::class, 'parent_id', 'id');
    }
}
