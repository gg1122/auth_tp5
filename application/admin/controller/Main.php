<?php
namespace app\admin\controller;
use think\Controller;

class Main extends Base{
	public function index(){
		return view('index');
	}
}