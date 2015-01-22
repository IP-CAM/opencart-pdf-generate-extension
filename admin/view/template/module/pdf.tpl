<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
		  <div class="pull-right">
			<button type="submit" form="form-account" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
			<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
		  <h1><?php echo $heading_title; ?></h1>
		  <ul class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
			<?php } ?>
		  </ul>
		</div>
	</div>
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> <?php echo $text_setting; ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-account" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-status"><?php echo $entry_header; ?></label>
						<div class="col-sm-10">
							<textarea name="pdf_header" class="form-control"><?=$pdf_header?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-status"><?php echo $entry_footer; ?></label>
						<div class="col-sm-10">
							<textarea name="pdf_footer" class="form-control"><?=$pdf_footer?></textarea>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-file-text"></i> <?php echo $text_manual; ?></h3>
			</div>
			<div class="panel-body">
				<div class="tab-pane">
					<ol class="decimalList">
						<li><?=$text_step_1?></li>
						<li><?=$text_step_2?></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-download"></i> <?php echo $text_example; ?></h3>
			</div>
			<div class="panel-body">
				<div class="tab-pane">
					<div class="demo_download"><?=$download_link?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
ol.decimalList {list-style-type: decimal;}
ol.decimalList li {font-size: 15px; margin: 5px;}
.demo_download {padding-left: 45px; font-size: 15px;}
</style>
<?php echo $footer; ?>