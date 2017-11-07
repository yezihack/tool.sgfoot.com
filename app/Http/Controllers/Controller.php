<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $request = null;
    public $user_id = null;
    public $response = null;

    public function __construct(Request $request)
    {
        $this->response = response();
        $this->request  = $request;
    }

    /**
     * 判断是否是post请求
     * @return bool
     */
    public function isPost()
    {
        return strcasecmp($this->request->getMethod(), 'post') === 0;
    }

    /**
     * 判断是否是get请求
     * @return bool
     */
    public function isGet()
    {
        return strcasecmp($this->request->getMethod(), 'get') === 0;
    }

    /**
     * 判断是否ajax请求
     * @return bool
     */
    public function isAjax()
    {
        return $this->request->ajax();
    }

    /**
     *  输出 Json 信息
     * @param $status
     * @param null $msg
     * @param null $data
     * @return $this|Response|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function setJson($status, $msg = null, $data = null)
    {
        $content = ['status' => $status, 'msg' => $msg];
        if ($data != null) {
            $content['data'] = $data;
        }
        if (empty($msg)) {
            $content['msg'] = 'ok';
        }
        $this->response = $this->response->json($content)
            ->header('Pragma', 'no-cache')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        return $this->response;
    }
}
