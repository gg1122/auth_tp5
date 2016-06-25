<?php
namespace app\admin\controller;
use think\Contoller;
use app\admin\model\AuthRule as AuthRuleModel;

class AuthRule extends Base{
	/**
	 * 权限列表
	 * @author ning
	 * @DateTime 2016-06-23T13:20:01+0800
	 * @return   [type]                   [description]
	 */
	public function index(){
		$authRuleData = \think\Db::query('select id,name,title,pid,sort,path,type,concat(path,"-",id) as bpath from auth_rule where status=1 order by bpath');
		foreach ($authRuleData as $key => $value) {
			$authRuleData[$key]['count'] = count(explode('-', $value['path']));
		}
		$this->assign('data', $authRuleData);
		return view('index');
	}

	/**
	 * 添加权限
	 * @author ning
	 * @DateTime 2016-06-22T22:26:12+0800
	 */
	public function add(){
		if(request()->isPost()){
			$authRuleModel = new AuthRuleModel;
			if($authRuleModel->validate(true)->save(input('post.'))){
				$this->getSidebar();
				session('_auth_list_'.session('user_auth')['uid'].'1', null);
				return $this->success('添加成功',url('index'));
			}else{
				return $this->error($authRuleModel->getError());
			}
		}else{
			$pidData = \think\Db::query('select id,title,path,concat(path,"-",id) as bpath from auth_rule where status=1 and type=1 and is_show=1 order by bpath');
			foreach ($pidData as $key => $value) {
				$pidData[$key]['count'] = count(explode('-', $value['path']));
			}
			$this->assign('pidData', $pidData);
			return view('add');
		}
	}

	/**
	 * 编辑权限
	 * @author ning
	 * @DateTime 2016-06-23T21:33:15+0800
	 * @return   [type]                   [description]
	 */
	public function edit(){
		if(request()->isPost()){
			$authRuleModel = new AuthRuleModel;
			if($authRuleModel->validate(true)->save(input('post.'), ['id'=>input('post.id')])){
				$this->getSidebar();
				session('_auth_list_'.session('user_auth')['uid'].'1', null);
				return $this->success('修改成功',url('index'));
			}else{
				return $this->error($authRuleModel->getError());
			}			
		}else{
			$id = input('?get.id') ? input('get.id') : '';
			if(!$id){
				return $this->error('参数错误');
			}
			$data = \think\Db::name('auth_rule')->field('id,name,title,type,condition,pid,sort,is_show')->where('id',$id)->find();
			$pidData = \think\Db::query('select id,title,path,concat(path,"-",id) as bpath from auth_rule where status=1 and type=1 and is_show=1 order by bpath');
			foreach ($pidData as $key => $value) {
				$pidData[$key]['count'] = count(explode('-', $value['path']));
			}
			$this->assign('pidData', $pidData);			
			$this->assign('data',$data);
			return view('edit');
		}
	}

}