<?php 

namespace App\Services;

use App\Contracts\SubMenuInterface;
use App\SubMenu;

class SubMenuService implements SubMenuInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->sub_menu = new SubMenu();
	}
    
    /**
     * select all article
     *
     * @param 
     * @return  gallery
     */
    public function getAll()
    {
        return $this->sub_menu->get();
    }


    /**
     * Create salon 
     *
     * @param array $data
     * @return gallery
     */
    public function createPage($data)
	{
		return $this->sub_menu->create($data);
	}

    /**
     * get one album 
     *
     * @param array $id
     * @return gallery
     */
    public function getOne($id)
    {
        return $this->sub_menu->find($id);
    }

    /**
     * 
     */
    public function deleteSubmenu($id)
    {
        return $this->getOne($id)->delete();
    }
 

}