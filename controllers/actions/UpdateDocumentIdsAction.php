<?php
class UpdateDocumentIdsAction extends CAction
{
    public function run()
    {
        $res=false;
        $msg=Yii::t("common","Please Login First");
    	if ( Person::logguedAndValid() ) {
    		$answer = PHDB::findOne(Form::ANSWER_COLLECTION , array("formId"=>@$_POST["formId"], "user"=>@Yii::app()->session["userId"]));
    		if(!empty($answer)){
    			$sectionKey=$_POST["answerSection"];
    			$docKey=$_POST["answerKey"];
    			$docId=$_POST["documentId"];
    			$update=array("type"=>Document::COLLECTION, "id"=> $docId);
    			PHDB::update(Form::ANSWER_COLLECTION,
    			    array("_id"=>new MongoId((string)$answer["_id"])), 
                    array('$set' => array('answers.'.$sectionKey.'.'.$docKey => $update)));
    			$msg=Yii::t("common","Evrything allRight");
				$res=true;
    		}else
				$msg= "Answer not found";
		} 

		echo json_encode(array("result"=>$res, "msg"=>$msg));
    }
}