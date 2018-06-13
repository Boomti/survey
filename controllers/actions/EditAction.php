<?php
class EditAction extends CAction
{
    public function run() {
		$controller=$this->getController();
		
		//imagine a validation process

		if ( ! Person::logguedAndValid() ) 
 			return json_encode(array("result"=>false, "msg"=>Yii::t("common", "You are not loggued or do not have acces to this feature ")));
 		
 		if( $_POST["h"] != hash('sha256', $_POST["t"].Yii::app()->params["idOpenAgenda"] ) )
 			return json_encode( array( "result"=>false, "msg"=>Yii::t("common", "Bad Orgine request")));

 		unset( $_POST["t"] );
 		unset( $_POST["h"] );
 		$_POST["created"] = time();

 		$res = "Empty data cannot be saved";
		if ( !empty($_POST) )
        	$res = Form::save($_POST);
        // else
        // 	$res = Form::remove($type,$id, $label);
  		echo json_encode(array("result"=>$res, "answers"=>$_POST));
        exit;
	}
}