<?php 

namespace App\Services;

use App\Contracts\PageInterface;
use App\Pages;

class PageService implements PageInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->page = new Pages();
	}
    
    /**
     * select all article
     *
     * @param 
     * @return  page
     */
    public function getAll()
    {
        return $this->page->get();
    }


    /**
     * Create salon 
     *
     * @param array $data
     * @return page
     */
    public function createPage($data)
	{
		return $this->page->create($data);
	}

    /**
     * get one album 
     *
     * @param array $id
     * @return page
     */
    public function getOne($id)
    {
        return $this->page->find($id);
    }

    /**
     * get all menu and submenu
     *
     * @param 
     * @return page 
     */
    public function selectMenuSubmenu()
    {
        return $this->page->with('menuSubMenu')->get();
    }

    /**
     * Delete page
     *
     * @param
     * @return page
     */
    public function deletePage($id)
    {
         return $this->getOne($id)->delete();
    }
    
 

}