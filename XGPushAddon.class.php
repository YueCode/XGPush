<?php

namespace Addons\XGPush;
use Common\Controller\Addon;

/**
 * 信鸽推送插件
 * @author YueCode
 */

class XGPushAddon extends Addon{
		
        public $info = array(
            'name'=>'XGPush',
            'title'=>'信鸽推送',
            'description'=>'信鸽服务端推送插件',
            'status'=>0,
            'author'=>'YueCode',
            'version'=>'0.1'
        );

        public function install(){
	        $file = $this->checkclassfile();
	        $controller= $this->checkcontroller();
	        $view=$this->checkview();
            return true;
        }

        public function uninstall(){
	        $file = $this->checkclassfile();
	        $controller= $this->checkcontroller(); 
	        $view=$this->checkview();    
            return true;
        }

		private function checkclassfile ()
			{
				$file = 'ThinkPHP\Library\OT\XingeApp.class.php';
				$addonsfile='Addons\XGPush\Model\XingeApp.class.php';
				if (is_readable($file) == false) { 
						rename($addonsfile,$file);
					}
					else
					{
						rename($file,$addonsfile);
						
					} 
				return true;
			}
		private function checkcontroller ()
		{
			$file = 'Application\Admin\Controller\XingeController.class.php';
			$addonscontroller='Addons\XGPush\Controller\XingeController.class.php';
			if (is_readable($file) == false) { 
						rename($addonscontroller,$file);
					}
					else
					{
						rename($file,$addonscontroller);
						
					} 
				return true;
		}
		private function checkview ()
		{
			$file = 'Application\Admin\View\Xinge';
			$view='WWW\Addons\XGPush\View';
			if (is_readable($file) == false) { 
						rename($view,$file);
					}
					else
					{
						rename($file,$view);
						
					} 
				return true;
		}
    }