<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $table = 'pages';

    

	protected $fillable = ['page_name'];

	/**
	 * 
	 */
	public function menuSubMenu()
	{
		return $this->belongsToMany('App\SubMenu','pageidsubmenuid','menu_id','submenu_id');
	}
	
}
