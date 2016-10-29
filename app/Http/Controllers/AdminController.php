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
use App\Contracts\PageInterface;
use App\Contracts\SubMenuInterface;
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
     * get /ab-admin
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
      * GET /admin/login-out
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
     * post /ab-admin/login
     *
     * @param AdminLoginRequest $request
     * @return redirect
     */
    public function postLogin(AdminLoginRequest $request)
    {
    	$email = $request->get('email');
    	$password  = $request->get('password');
    	
    	// if ($request->input('remember_me')) {
    	// 	$response = Cookie::forever('remember',Auth::user());
    	// }

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
     * Get ab-admin/dashboard
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
     * Get Add Article
     * Get ab-admin/article
     *
     * @param 
     * @return view
     */
    public function getAddArticle()
    {
    	return view('admin.article.article');
    }

    /**
     * POST Add Article
     * POST ab-admin/article-add
     * 
     * @param ArticleRequest $request
     * @param ArticleRequest $articleRepo
     * @return redirect
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
     * POST Add article image
     * POST ab-admin/article-uploade
     *
     * @param request $request
     * @return response
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
     * GET Article List
     * GET ab-admin/article-list
     * 
     * @param ArticleInterface $articleRepo
     * @return view
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
     * GET delete article
     * GET ab-admin/article-delete/{id}
     *
     * @param $id
     * @param ArticleInterface $articleRepo
     * @return redirect
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
     * GET edit article
     * GET ab-admin/article-edit/{id}
     * 
     * @param $id
     * @param ArticleInterface $articleRepo
     * @return view
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
     * POST update article
     * POST ab-admin/article-update
     * 
     * @param request $request
     * @param ArticleInterface $articleRepo
     * @return redirect
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
     * GET Youtube
     * GET ab-admin/youtube
     *
     * @param YoutubeInerface $youtbeRepo
     * @return view
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
     * POST add youtube video
     * POST ab-admin/add-youtube
     *
     * @param request $request
     * @param YoutubeInerface $youtbeRepo
     * @return redirect
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
     * GET delete youtube video
     * GET ab-admin/youtube/{id}
     * 
     * @param $id
     * @param YoutubeInerface $youtbeRepo
     * @return redirect
     */
    public function getDeleteYoutube($id,YoutubeInerface $youtbeRepo)
    {
        $youtbeRepo->deletevideo($id);
        return redirect()->back()->with('error','You are delete this file');
    }

    /**
     * GET edit youtube video
     * GET ab-admin/youtube-edit/{id}
     *
     * @param $id
     * @param YoutubeInerface $youtbeRepo
     * @return view
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
     * GET Gallery
     * GET ab-admin/gallery-list
     * 
     * @param GalleryInterface $galleryRepo
     * @return view
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
     * GET Add Gallery page
     * GET ab-admin/add-gallery
     * 
     * @param 
     * @return view
     */
    public function getAddGallery()
    {
       return view('admin.gallery.add-gallery');
    }

    /**
     * POST Add Gallery
     * POST ab-admin/add-gallery
     * 
     * @param request $request
     * @param GalleryInterface $galleryRepo
     * @return redirect
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
     * GET Delete gallery
     * GET ab-admin/delete-gallery/{id}
     * 
     * @param $id
     * @param GalleryInterface $galleryRepo
     * @return response
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
     * POST edit gallery images
     * POST ab-admin/gallery-image-edit
     * 
     * @param request $request
     * @param GalleryInterface $galleryRepo
     * @return response
     */
    public function posteditGalleryImages(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
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

    /**
     * POST yutube parametrs on of
     * POST ab-admin/youtube-autoplay
     * 
     * @param request $request
     * @param YoutubeInerface $youtbeRepo
     * @return redirect
     */
    public function postAutoplay(request $request,YoutubeInerface $youtbeRepo)
    {
        $result = $request->all();
        $id = $result['id'];

        if(isset($result['width']) || isset($result['height'])){
            $data4 = [
                'width' => $result['width'],
                'height' => $result['height']
            ];
            dd($data4);
            $youtbeRepo->getUpdateYoutube($result['id'],$result);
            return redirect()->back();
        }

        if(isset($result['autoplay'])){
            if($result['autoplay'] == 1){
                $data1 = [
                    'autoplay' => '1',
                ];
            }else{
                $data1 = [
                    'autoplay' => '0',
                ];
            }
            $youtbeRepo->getUpdateYoutube($id,$data1);
        }

        if(isset($result['info'])){
            if($result['info'] == 1){
                $data2 = [
                    'info' => '1',
                ];
            }else{
                $data2 = [
                    'info' => '0',
                ];
            }
            $youtbeRepo->getUpdateYoutube($id,$data2);
        }

        if(isset($result['panel'])) {
             if($result['panel'] == 1){
                $data2 = [
                    'panel' => '1',
                ];
            }else{
                $data2 = [
                    'panel' => '0',
                ];
            }
            $youtbeRepo->getUpdateYoutube($id,$data2);
        }        
        $data = [
            'video' => $result['video']
        ];
        $youtbeRepo->getUpdateYoutube($id,$data);
        return response()->json($data);
    }

    /**
     * 
     */
    public function getAddPage()
    {
        return view('admin.page.add-page');
    }

    /**
     * 
     */
    public function getPageList(PageInterface $pageRepo)
    {
        $result = $pageRepo->selectMenuSubmenu();
        $param = $pageRepo->getAll();
        $json = json_encode($pageRepo->getAll());
        $data = [
            'pages' => $json
        ];
        return view('admin.page.page-list',$data);
    }

    /**
     * 
     */
    public function postAddPage(request $request,PageInterface $pageRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'page_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($request['_token']);
            $pageRepo->createPage($result);
        }
        return redirect()->action('AdminController@getPageList');
    }

    /**
     * 
     */
    public function getSubMenu(PageInterface $pageRepo)
    {
        $result = $pageRepo->getAll();
        $data = [
            'pages' => $result
        ];
        return view('admin.page.sub-menu',$data);
    }

    /**
     * 
     */
    public function postAddSubmenu(request $request,SubMenuInterface $submenuRepo,PageInterface $pageRepo)
    {
        $result = $request->all();
        $data = [
            'sub_menu' => $result['sub_menu']
        ];
        $sub = $submenuRepo->createPage($data);
        $pageObj = $pageRepo->getOne($result['page_name']);
        $pageObj->menuSubMenu()->attach($sub->id);
        return redirect()->back()->with('error','You add Sub menu');
    }

}
