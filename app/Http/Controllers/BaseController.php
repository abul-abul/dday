<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\LanguageInterface;

use App\Http\Requests;

class BaseController extends Controller
{
    public $language;

    public $currentPathWithoutLocale;


    public function __construct($langRepo)
    {
        //$this->language = config('app.locale');
        $lang = $langRepo->getAll();

        $this->currentPathWithoutLocale = substr( implode(\Request::segments(), '/'), 3);

        $data = [
           'languages' => $lang,
           'currentPathWithoutLocale' => $this->currentPathWithoutLocale,
        ];

        view()->share($data);
    }

}
