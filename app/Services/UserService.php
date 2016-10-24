<?php 

namespace App\Services;

use App\Contracts\UserInterface;
use App\User;


class UserService implements UserInterface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
        $this->user = new User();
	}

    /**
    * Create new user 
    *
    * @param array $dataArray
    * @return response
    */
	public function createOne($dataArray)
	{
		return $this->user->create($dataArray);
	}

    /**
    * Get one user by user id
    *
    * @param integer $id
    * @return response
    */
    public function getOne($id)
    {
        return $this->user->find($id);
    }

    /**
     * Select all social login Email
     *
     * @param @emil
     * @return user
     */
    public function getAllSocial($email)
    {
        return $this->user->where('email',$email)->first();
    }

    /**
     * Update token 
     *
     * @param $token
     * @param $email
     * @return user
     */
    public function updateSocialToken($email,$token)
    {
        return $this->user->where('email',$email)->update($token);
    }

    /**
     * Select All user
     *
     * @param 
     * @return user 
     */
    public function getAllUser()
    {
        return $this->user->get();
    }

    /**
     * 
     */
    public function getUserReg()
    {
        return $this->user->where('facebook_id',null)->where('google_id',null)->where('twitter_id',null)->where('role','user')->get();
    }

    /**
     * Select All users in facebook
     *
     * @param
     * @return user
     */
    public function getAllUserFacebook()
    {
        return $this->user->where('facebook_id','!=', null)->get();
    }

    /**
     * Select All users in google
     * 
     * @param 
     * @return user 
     */
    public function getAllUserGoogle()
    {
        return $this->user->where('google_id','!=', null)->get();
    }

    /**
     * Select All users in tweeter
     *
     * @param
     * @return user
     */
    public function getAllUserTweeter()
    {
        return $this->user->where('twitter_id','!=', null)->get();
    }
}