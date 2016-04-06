<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


class indexCtrl extends \ppphp
{
	public function __construct()
	{
		$this->route = new \ppphp\route();
		$this->assign('action',$this->route->action);

	}

	public function index()
	{
		$this->display('index/index.html');
	}

	public function doc()
	{
		$id = $this->route->urlVar(0,1);
		$model = new \app\model\articleModel();
		$articleList = $model->lists();
		$article = $model->getOne($id);
		$this->assign('article',$article);
		$this->assign('articleList',$articleList);
		$this->display('index/doc.html');
	}

	public function test()
	{
		$pool = new \Stash\Pool();
		$item = $pool->getItem('./log');
	}
}