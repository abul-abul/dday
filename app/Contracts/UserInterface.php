<?php 

namespace App\Contracts;

interface UserInterface
{
	/**
     * Create new  user 
     *
     * @param array  $dataArray
     * @return response
     */
	public function createOne($dataArray);

    /**
     * Get one user by user id
     *
     * @param integer $id
     * @return response
     */	
    public function getOne($id);

    /**
     * Select all social login Email
     *
     * @param @emil
     * @return user
     */
    public function getAllSocial($email);

    /**
     * Update token 
     *
     * @param $token
     * @param $email
     * @return user
     */
    public function updateSocialToken($email,$token);

    /**
     * Select All user
     *
     * @param 
     * @return user 
     */
    public function getAllUser();

    /**
     * Select All users in facebook
     *
     * @param
     * @return user
     */
    public function getAllUserFacebook();

    /**
     * Select All users in google
     * 
     * @param 
     * @return user 
     */
    public function getAllUserGoogle();

    /**
     * Select All users in tweeter
     *
     * @param
     * @return user
     */
    public function getAllUserTweeter();

    /**
     * 
     */
    public function getUserReg();
}
