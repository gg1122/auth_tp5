<?php
namespace app\admin\model;
use think\Model;

class AuthGroup extends Model{
	protected $auto = ['update_time'];
	protected $insert = ['create_time','rules'];

	protected function setRulesAttr(){
		return '1,6,11';
	}
}