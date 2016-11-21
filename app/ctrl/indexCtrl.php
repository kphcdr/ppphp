<?php
/**
 * 示例控制器
 */
namespace app\ctrl;

use ppphp\cache;
use ppphp\view;

class indexCtrl extends \ppphp
{
	use view;
	public function __construct()
	{
		$this->route = new \ppphp\route();
		$this->assign('action',$this->route->action);
		$confModel = new \app\model\confModel();
		$conf = $confModel->getAll();
		$this->assign('conf',$conf);
	}

	public function index()
	{
		$this->display('index/index.html');
	}

	public function getIndex()
	{
		$this->display('index/index.html');
	}

	public function doc()
	{
		$id = $this->route->urlVar(0,1);
		$model = new \app\model\articleModel();
		$articleList = $model->doc();
		$article = $model->one($id);
		if(!$article) {
			show404();
		}
		$this->assign('is_comment',$this->route->urlVar(0));
		$this->assign('article',$article);
		$this->assign('articleList',$articleList);
		$this->display('index/doc.html');
	}

	public function blog()
	{
		$model = new \app\model\articleModel();
		$id = $this->route->urlVar(0);
		if(empty($id)) {
			//获取到最新的文章
			$id = $model->getLastArticleId();
		} else {
			$this->assign('is_comment',1);
		}
		$articleList = $model->blog();
		$article = $model->one($id);
		if(!$article) {
			show404();
		}
		$this->assign('article',$article);
		$this->assign('articleList',$articleList);
		$this->display('index/blog.html');
	}
	public function test()
	{
		$cache = new cache();
		$cache->clear();


	}
}