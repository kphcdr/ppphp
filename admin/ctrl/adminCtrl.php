<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;


use admin\model\adminModel;

class adminCtrl extends \admin\ctrl\commonCtrl
{

	public function index()
	{
		$adminModel = new adminModel();
		$data = $adminModel->adminList();
		$this->assign('data',$data);
		$this->display('admin/admin.html');
	}

	public function infoadmin()
	{
		$id = get('id','int');
		if($id) {
			$adminModel = new adminModel();
			$data['data'] = $adminModel->getOne($id);
			$this->assign('data',$data);
		}
		$this->display('admin/infoadmin.html');
	}

	public function saveadmin()
	{
		if(http_method() == 'POST') {
			$data = post();
			$adminModel = new adminModel();
			if(!$data['password']) {
				unset($data['password']);
			} else {
				$data['password'] = $adminModel->_encodePassword($data['password']);
			}

			if(isset($data['id']) && $data['id'] != '') {
				$id = $data['id'];
				unset($data['id']);
				$ret = $adminModel->setOne($id,$data);
			} else {
				$ret = $adminModel->addOne($data);
			}

			if($ret !== false) {
				redirect('/admin');
			} else {
				error('操作失败,请稍后重试');
			}
		}

	}

	public function deladmin()
	{
		$id = get('id','int');
		if($id) {
			$adminModel = new adminModel();
			$adminModel->delOne($id);
		}
		redirect('/admin');
	}

	public function conf()
	{
		$confModel = new \admin\model\confModel();
		$data = $confModel->getAll();

		$this->assign('data',$data);
		$this->display('admin/conf.html');
	}

	public function infoconf()
	{
		$id = get('id','int');
		if($id) {
			$confmodel = new \admin\model\confModel();
			$data['data'] = $confmodel->getOne($id);
			$this->assign('data',$data);
		}
		$this->display('admin/infoconf.html');
	}

	public function saveconf()
	{
		if(http_method() == 'POST') {
			$data = post();
			$confmodel = new \admin\model\confModel();
			if(isset($data['id']) && $data['id'] != '') {
				$id = $data['id'];
				unset($data['id']);
				$ret = $confmodel->setOne($id,$data);
			} else {
				$ret = $confmodel->addOne($data);
			}

			if($ret !== false) {
				redirect('/admin/conf');
			} else {
				error('操作失败,请稍后重试');
			}
		}
	}

	public function delconf()
	{
		$id = get('id','int');
		if($id) {
			$confmodel = new \admin\model\confModel();
			$confmodel->delOne($id);
		}
		$data = new \ppphp\route();

		redirect('/admin/conf');
	}
}