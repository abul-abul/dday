<?php 

namespace App\Contracts;

interface PageInterface
{

     /**
     * select all article
     *
     * @param 
     * @return  page
     */
    public function getAll();


   /**
     * Create salon 
     *
     * @param array $data
     * @return page
     */
    public function createPage($data);
    
    /**
     * get one album 
     *
     * @param array $id
     * @return response
     */
    public function getOne($id);

    
    /**
     * get all menu and submenu
     *
     * @param 
     * @return page 
     */
    public function selectMenuSubmenu();

    /**
     * Delete page
     *
     * @param
     * @return page
     */
    public function deletePage($id);

}
