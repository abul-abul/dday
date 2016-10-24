<?php 

namespace App\Services;

use App\Contracts\YoutubeInerface;
use App\Youtube;


class YoutubeService implements YoutubeInerface
{

	/**
	* Create a new instance of UserService class
	*
	* @return void
	*/
	public function __construct()
	{
        $this->youtube = new Youtube();
	}

    /**
     * Create video in youtube
     *
     * @param $data
     * @return youtube
     */
    public function createYoutubeVideo($data)
    {
        return $this->youtube->create($data);
    }

    /**
     * Get one video
     *
     * @param $id
     * @return youtube
     */
    public function getOneYoutubeVideo($id)
    {
        return $this->youtube->find($id);
    }

    /**
     * Get All video
     * 
     * @param 
     * @return youtube
     */
    public function getAllYoutbeVideo()
    {
        return $this->youtube->get();
    }

    /**
     * Get All video paginate
     * 
     * @param 
     * @return youtube
     */
    public function getAllYoutbeVideoPaginate()
    {
        return $this->youtube->paginate(3);
    }
   
    /**
     * update  youtube video 
     *
     * @param array $id
     * @param array $data
     * @return response
     */
    public function getUpdateYoutube($id,$data)
    {
        return $this->getOneYoutubeVideo($id)->update($data); 
    }

    /**
      * delete album 
      *
      * @param array $id
      * @return response
     */
    public function deletevideo($id)
    {  
        return $this->getOneYoutubeVideo($id)->delete();
    }
}