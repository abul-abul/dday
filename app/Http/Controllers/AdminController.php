<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\admin\AdminLoginRequest;
use App\Http\Requests\admin\ArticleRequest;
use App\Contracts\ArticleInterface;
use App\Contracts\UserInterface;
use App\Contracts\YoutubeInerface;
use App\Contracts\GalleryInterface;

use View;
use Session;
use Validator;
use Auth;
use File;
use Cookie;

class AdminController extends BaseController
{

	/**
     * Create a new instance of BaseController class.
     *
     * @return void
     */
	public function __construct()
    {
        //parent::__construct();
        $this->middleware('authadmin', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }

    /**
     * Admin Login
     * get /ab-admin/logout
     *
     * @param
     * @return view
     */
    public function getLogin()
    {//dd(1);
    	//$remember = Cookie::get('remember');

    	// if(isset($remember)){

    	// 	//$user_cookie = Cookie::get('remember');

    	// 	$data = [
	    // 		'cookie_user' => $user_cookie,
	    // 	];
	    // 	return view('admin.admin-login.admin-login',$data);
    	// }else{
			return view('admin.admin-login.admin-login');
    	//}
		//return view('admin.admin-login.admin-login');
    }

    /**
      * Admin Logout
      * GET /admin/logout
      *
      * @param 
      * @return redirect
     */
    public function getLogout()
    {   
        Auth::logout();
        return redirect()->action('AdminController@getLogin');
    }

    /**
     * Admin Login
     * post /ab-admin/logout
     *
     * @param AdminLoginRequest $request
     * @return redirect
     */
    public function postLogin(AdminLoginRequest $request)
    {
    	$email = $request->get('email');
    	$password  = $request->get('password');
    	
    	if ($request->input('remember_me')) {
    		$response = Cookie::forever('remember',Auth::user());
    	}

    	if(Auth::attempt ([
            'email'=>$email,
            'password'=>$password,
            'role' => 'main-admin',
            ]))
        {
            if($request->input('remember_me')) {
        		$response = Cookie::forever('remember',Auth::user());
        		$cookie =  \Response::make('www')->withCookie($response);
        		return redirect()->action('AdminController@getDashboard')->withCookie($response);
        	}else{
        		return redirect()->action('AdminController@getDashboard');
        	}        	
        }else{
        	return redirect()->back()->with('error_danger', 'Invalid login or password');
        }
    }

    /**
     * Get dashboard page
     *
     * @param 
     * @return view
     */
    public function getDashboard(UserInterface $userRepo)
    {
        $all_user = $userRepo->getAllUser();
        $all_user_reg = $userRepo->getUserReg();
        $all_user_facebook = $userRepo->getAllUserFacebook();
        $all_user_google = $userRepo->getAllUserGoogle();
        $all_user_tweeter = $userRepo->getAllUserTweeter();
        $data = [
            'all_user' => $all_user,
            'all_user_reg' => $all_user_reg,
            'face_user' => $all_user_facebook,
            'google_user' => $all_user_google,
            'tweeter_user' => $all_user_tweeter,
        ];
    	return view('admin.dashboard',$data);
    }

    /**
     * 
     */
    public function getAddArticle()
    {
    	return view('admin.article.article');
    }

    /**
     * 
     */
    public function postAddArticle(ArticleRequest $request,ArticleInterface $articleRepo)
    {
    	$result = $request->all();
    	$logoFile = $result['image']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/admin/images/article_uploade';
        $result_move = $result['image']->move($path, $name.'.'.$logoFile); 
        $article_images = $name.'.'.$logoFile;

    	$data = [
    		'description' => $result['description'],
    		'title' => $result['title'],
    		'image' => $article_images
    	];
    	$articleRepo->createArticle($data);
    	return redirect()->action('AdminController@getArticleList');
    }

    /**
     * 
     */
    public function postUploadeArticleAjax(request $request)
    {
    	$result = $request->all();
    	$logoFile = $result['file']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/admin/images/article_uploade';
        $result_move = $result['file']->move($path, $name.'.'.$logoFile);
        $article_images = $name.'.'.$logoFile;
        return response()->json($article_images);
    }

    /**
     * 
     */
    public function getArticleList(ArticleInterface $articleRepo)
    {
        $result = $articleRepo->getAllPaginate();
        $data = [
            'articles' => $result,
        ];
        return view('admin.article.article-list',$data);
    }
    
    /**
     * 
     */
    public function getDeleteArticle($id,ArticleInterface $articleRepo)
    {
        $file = $articleRepo->getOne($id);
        $filename = public_path() . '/assets/admin/images/article_uploade/' . $file['image'];
        $status = File::delete($filename);
        $articleRepo->deleteArticle($id);
        return redirect()->back()->with('error','Your file was delete succesfully');
    }

    /**
     * 
     */
    public function getEditArticle($id,ArticleInterface $articleRepo)
    {
        $result = $articleRepo->getOne($id);
        $data = [
            'articles' => $result
        ];
        return view('admin.article.article-edit',$data);
    }

    /**
     * 
     */
    public function postUpdateArticle(request $request,ArticleInterface $articleRepo)
    {
        $result = $request->all();
        $id = $result['id'];
       
        if (isset($result['image'])) {
            $oldObj = $articleRepo->getOne($id);
            $oldImg = public_path() .'/assets/admin/images/article_uploade/' . $oldObj->image;
            File::delete($oldImg);
            $logoFile = $result['image']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/admin/images/article_uploade';
            $result_move = $result['image']->move($path, $name.'.'.$logoFile);
            $article_images = $name.'.'.$logoFile;
            $result['image'] = $article_images;
        }
        
        $articleRepo->getUpdateArticle($id,$result);
        return redirect()->action('AdminController@getArticleList');
    }

    /**
     * 
     */
    public function getYoutube(YoutubeInerface $youtbeRepo)
    {
        $result = $youtbeRepo->getAllYoutbeVideoPaginate();
        $data = [
            'vidoes' => $result
        ];
        return view('admin.youtube.youtube',$data);
    }

    /**
     * 
     */
    public function postAddYoutbeVideo(request $request,YoutubeInerface $youtbeRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'video' => 'required',
            'width' => 'required',
            'height' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $youtbeRepo->createYoutubeVideo($result);
        }
        return redirect()->back();
    }

    /**
     * 
     */
    public function getDeleteYoutube($id,YoutubeInerface $youtbeRepo)
    {
        $youtbeRepo->deletevideo($id);
        return redirect()->back()->with('error','You are delete this file');
    }

    /**
     * 
     */
    public function getEditYoutubeVideo($id,YoutubeInerface $youtbeRepo)
    {
        $result = $youtbeRepo->getOneYoutubeVideo($id);
        $data = [
            'videos' => $result
        ];
        return view('admin.youtube.edit-youtube-video',$data);
    }

    /**
     * 
     */
    public function getGallery(GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getAll();
        $data = [
          'images' => $result
        ];
        return view('admin.gallery.gallery',$data);
    }

    /**
     * 
     */
    public function getAddGallery()
    {
       return view('admin.gallery.add-gallery');
    }

    /**
     * 
     */
    public function postAddGallery(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'image_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            foreach ($result['image_name'] as $key => $image) {
                $logoFile = $image->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/admin/images/gallery_uploade';
                $result_move = $image->move($path, $name.'.'.$logoFile);
                $article_images = $name.'.'.$logoFile;
                $data['image_name'] = $article_images;
                $galleryRepo->createGallery($data);
            }
            return redirect()->action('AdminController@getGallery');
        }
    }

    /**
     * 
     */
    public function getDeleteGallery($id,GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getOne($id);
        $imgname = $result->image_name;
        $path = public_path() . '/assets/admin/images/gallery_uploade/' . $imgname;
        File::delete($path);
        $galleryRepo->deleteGallery($id);
        return response()->json();
    }

    /**
     * 
     */
    public function posteditGalleryImages(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        //dd($result['file']);
        $id = $result['id'];
        $row = $galleryRepo->getOne($id);
        $oldPath = public_path() . '/assets/admin/images/gallery_uploade/' . $row['image_name'];
        File::delete($oldPath);
        $logoFile = $result['file']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/admin/images/gallery_uploade';
        $result_move = $result['file']->move($path, $name.'.'.$logoFile);
        $gallery_images = $name.'.'.$logoFile;
        $data['image_name'] = $gallery_images;
        $galleryRepo->updateImagesGallery($id,$data);
        return response()->json($gallery_images);
    }

}
