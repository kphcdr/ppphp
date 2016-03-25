<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;

use admin\model\articleModel;

class articleCtrl extends commonCtrl
{

	public function index()
	{
		$articleModel = new articleModel();
		$data = $articleModel->articleListPage();
		$this->assign('data',$data);
		$this->display('article/article.html');
	}

	public function infoarticle()
	{
		$id = get('id','int');
		if($id) {
			$articleModel = new articleModel();
			$data['data'] = $articleModel->getOne($id);
			$this->assign('data',$data);
		}
		$this->display('article/infoarticle.html');
	}

	public function savearticle()
	{
		if(http_method() == 'POST') {
			$data = post();
			if(!$data['password']) {
				unset($data['password']);
			}
			$articleModel = new articleModel();
			if(isset($data['id']) && $data['id'] != '') {
				$id = $data['id'];
				unset($data['id']);
				$ret = $articleModel->setOne($id,$data);
			} else {
				$ret = $articleModel->addOne($data);
			}

			if($ret !== false) {
				redirect('/article');
			} else {
				error('操作失败,请稍后重试');
			}
		}

	}

	public function delarticle()
	{
		$id = get('id','int');
		if($id) {
			$articleModel = new articleModel();
			$articleModel->delOne($id);
		}
		redirect('/article');
	}

	public function category()
	{
		$categoryModel = new \admin\model\categoryModel();
		$data = $categoryModel->categoryList();

		$this->assign('data',$data);
		$this->display('article/category.html');
	}

	public function infocategory()
	{
		$id = get('id','int');
		if($id) {
			$categorymodel = new \admin\model\categoryModel();
			$data['data'] = $categorymodel->getOne($id);
			$this->assign('data',$data);
		}
		$this->display('article/infocategory.html');
	}

	public function savecategory()
	{
		if(http_method() == 'POST') {
			$data = post();
			$categorymodel = new \admin\model\categoryModel();
			if(isset($data['id']) && $data['id'] != '') {
				$id = $data['id'];
				unset($data['id']);
				$ret = $categorymodel->setOne($id,$data);
			} else {
				$ret = $categorymodel->addOne($data);
			}

			if($ret !== false) {
				redirect('/article/category');
			} else {
				error('操作失败,请稍后重试');
			}
		}
	}

	public function delcategory()
	{
		$id = get('id','int');
		if($id) {
			$categorymodel = new \admin\model\categoryModel();
			$categorymodel->delOne($id);
		}
		redirect('/article/category');
	}
}