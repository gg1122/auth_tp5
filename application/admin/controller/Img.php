<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Img extends Controller{
	public function index(){
		$id = input('?get.id') ? input('get.id') : '';
		if(!$id){
			return $this->error('参数错误');
		}
		$data = Db::name('wxbuluo_img')->where('id',$id)->find();
		$this->assign('data',$data);
		// dump($data);exit;
		return view('index');
	}
}