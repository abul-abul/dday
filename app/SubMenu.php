<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'submenu';

    protected $fillable = ['id','sub_menu'];
}
