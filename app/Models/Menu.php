<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use ModelTree;
    public function menuTypes()
    {

        return $this->hasMany(MenuType::class, 'parent_id', 'id');
    }


}
