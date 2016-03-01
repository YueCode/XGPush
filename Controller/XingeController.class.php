<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;


/**
 * 后台首页控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class XingeController extends AdminController {

    /**
     * 后台首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
	    if (IS_POST){
		    $data=I('post.');
		    $xg=new \OT\XingeApp();
			$config=get_addon_config('XGPush');
			if ($config['accessId'] == ''||  $config['accessId'] == ''){
				$this->error('请完善您的配置文件');
			}
			if ($data['device'] == 0){
				$res=$xg->PushAllAndroid($config['accessId'],$config['secretKey'],I('post.title'),I('post.content'));
				$res2=$xg->PushAllIos($config['accessId'],$config['secretKey'],I('post.title'),I('post.content'));
			}
			if ($data['device'] == 1){
				$res=$xg->PushAllAndroid($config['accessId'],$config['secretKey'],I('post.title'),I('post.content'));
			}
			if ($data['device'] == 2){
				$res=$xg->PushAllIos($config['accessId'],$config['secretKey'],I('post.title'),I('post.content'));
			}
			$this->success('推送成功！');
	    }
	    else{
			$this->meta_title = '信鸽推送';
	        $this->display();
	    }
        
    }

}
