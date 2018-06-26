<?php 
	if( $form["author"] != Yii::app()->session["userId"] ){?>
		<div class="col-lg-offset-1 col-lg-10 col-xs-12 margin-top-50 text-center text-red">	
			<i class='fa fa-lock fa-4x '></i><br/>
			<h1 class=''><?php echo Yii::t("project", "Unauthorized Access.")?></h1>
		</div>
		<?php 
	} else {
	 ?>
<div class="panel panel-white col-lg-offset-1 col-lg-10 col-xs-12 no-padding margin-top-50">
	
	<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<h1><?php echo $form["title"] ?> <a href="/ph/survey/co/index/id/<?php echo $form["id"] ?>"><i class="fa fa-arrow-circle-right"></i></a> </h1>
		<div id="" class="" style="width:80%;  display: -webkit-inline-box;">
	    	<input type="text" class="form-control" id="input-search-table" 
	                        placeholder="search by name or by #tag, ex: 'commun' or '#commun'">
		    <button class="btn btn-default hidden-xs menu-btn-start-search-admin btn-directory-type">
		        <i class="fa fa-search"></i>
		    </button>
	    </div>
    </div>
	
	
	<div class="pageTable col-md-12 col-sm-12 col-xs-12 padding-20 text-center"></div>
	<div class="panel-body">
		<div>	
			<a href="" class="btn btn-primary btn-xs pull-right margin-10">Invite Admins & Participants</a>
			<?php //var_dump($projects) ?>
			<table class="table table-striped table-bordered table-hover  directoryTable" id="panelAdmin">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>userID</th>
						<th>Read Answers</th>
					</tr>
				</thead>
				<tbody class="directoryLines">
				<?php  foreach ($results as $key => $v) { ?>
					<tr>
						<td><?php echo $v["name"]; ?></td>
						<td><?php echo $v["email"]; ?></td>
						<td><?php echo $v["user"]; ?></td>
						<td><a href="/ph/survey/co/answer/id/<?php echo (string)$form["id"]?>/user/<?php echo $v["user"]; ?>" >Read</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>
	<div class="pageTable col-md-12 col-sm-12 col-xs-12 padding-20"></div>
</div>
<?php } ?>