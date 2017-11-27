<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Applications
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  ApplicationsController {
	
		    
	static function _construct() {
		self::view();
	}
	
	static function view() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_worknow")->replace()->view();
	    //include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';

	}
	
	static function curentfinish() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_execute")->replace()->view();
		ApplicationsAction::curent_finish();
		Redirect::url("applications/execute/?message=отправлено на проверку!");
	}
	
	
	static function fullview() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_full")->replace()->view();
	}
	
	static function add() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_add")->replace()->view();
	}
	
	
	
	static function worknow() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_worknow")->replace()->view();
	}
	
	
	
	static function edit() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_edit")->replace()->view();
		ApplicationsAction::edit();
	}
	
	
	static function delete() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_worknow")->replace()->view();
		ApplicationsAction::delete();
	}
	
	
	
	static function finished() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_finished")->replace()->view();
	}
	
	
	
	static function offtimes() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_offtimes")->replace()->view();
	}
	
	
	static function execute() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_execute")->replace()->view();
	}
	
    
	static function confirm() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_execute")->replace()->view();
		ApplicationsAction::execute_confirm();
	}
	
	
		
	static function control() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_control")->replace()->view();
	}
	
	
	static function ipuzzle() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_ipuzzle")->replace()->view();
	}
	
	
	
	static function returned() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_ipuzzle")->replace()->view();
		ApplicationsAction::returned();
	}
	
	
	static function resolution() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_resolution")->replace()->view();
	
	}
	
	


	
	static function apply() {
	    $Templater = new Templater();
		$Superquery = new Superquery;
		include_once ROOT.SEPARATOR.'core/actions/ApplicationsAction.php';
		$Templater->getContent("applications_resolution")->replace()->view();
		
		if(isset($_GET['id']) && $_GET['act'] == "apply") {
			if($_SESSION['user']['role'] == 1) {
			   ApplicationsAction::resolution_apply(); 
			} else {
			 Redirect::url("applications/resolution/?message=Нет прав доступа");
				}
		}
	}
	
	
} 
		
		
?>