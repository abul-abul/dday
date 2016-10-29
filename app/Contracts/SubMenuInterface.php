<?php 

namespace App\Contracts;

interface SubMenuInterface
{

     /**
     * select all article
     *
     * @param 
     * @return  gallery
     */
    public function getAll();


   /**
     * Create salon 
     *
     * @param array $data
     * @return gallery
     */
    public function createPage($data);
    
    /**
     * get one album 
     *
     * @param array $id
     * @return response
     */
    public function getOne($id);

    
}
