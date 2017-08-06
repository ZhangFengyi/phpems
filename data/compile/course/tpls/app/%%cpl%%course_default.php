<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.php">首页</a></li>
						<li><a href="index.php?course">课程</a></li>
						<?php $cbid = 0;
 foreach($this->tpl_var['catbread'] as $key => $cb){ 
 $cbid++; ?>
						<li><a href="index.php?course-app-category&catid=<?php echo $cb['catid']; ?>"><?php echo $cb['catname']; ?></a></li>
						<?php } ?>
						<li class="active"><?php echo $this->tpl_var['cat']['catname']; ?></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="main" id="datacontent">
<?php } ?>
			<div class="col-xs-8" style="padding-left:0px;position:relative;">
				<div class="box itembox" style="height:auto;width:800px;top:0px;z-index:99">
					<h4 class="title"><?php echo $this->tpl_var['content']['coursetitle']; ?></h4>
					<?php if($this->tpl_var['content']['course_files'] || $this->tpl_var['content']['course_oggfile'] || $this->tpl_var['content']['course_webmfile']){ ?>
					<div style="margin-top:10px;" controls="true" width="100%" height="450" id="movieplatform">
					</div>
					<?php } else { ?>
					<embed src="<?php echo $this->tpl_var['content']['course_youtu']; ?>" allowFullScreen="true" quality="high" width="100%" height="450" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
					<?php } ?>
					<blockquote class="text-info"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['content']['coursedescribe'])); ?></blockquote>
				</div>
			</div>
			<div class="col-xs-4 pull-right" style="padding-right:0px;">
				<div class="box itembox" style="padding-top:10px;">
					<h4 class="title"><?php echo $this->tpl_var['course']['cstitle']; ?></h4>
					<div>
						<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['course']['csdescribe'])); ?>
					</div>
				</div>
				<?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
				<div class="box" style="padding-top:10px;">
					<div class="col-xs-3">
						<a target="datacontent" href="index.php?course-app-course&page=<?php echo $this->tpl_var['page']; ?>&csid=<?php echo $this->tpl_var['course']['csid']; ?>&contentid=<?php echo $content['courseid']; ?>" class="ajax">
							<img src="<?php echo $content['coursethumb']; ?>" alt="" width="100%">
						</a>
					</div>
					<div class="col-xs-9">
						<a target="datacontent" href="index.php?course-app-course&page=<?php echo $this->tpl_var['page']; ?>&csid=<?php echo $this->tpl_var['course']['csid']; ?>&contentid=<?php echo $content['courseid']; ?>" class="ajax">
							<h4 class="title" style="margin-top:0px;">
							<?php if($this->tpl_var['content']['courseid'] == $content['courseid']){ ?>
							<span style="color:green;"><em class="glyphicon glyphicon-play-circle"></em></span>
							<?php } ?>
							<?php echo $content['coursetitle']; ?>
							</h4>
						</a>
						<p style="font-size:13px;"><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($this->ev->stripSlashes($content['coursedescribe']))),90); ?></p>
					</div>
				</div>
				<?php } ?>
				<ul class="pagination pull-right"><?php echo $this->tpl_var['contents']['pages']; ?></ul>
			</div>
			<?php if($this->tpl_var['content']['course_files'] || $this->tpl_var['content']['course_oggfile'] || $this->tpl_var['content']['course_webmfile']){ ?>
			<script type="text/javascript">
				var flashvars={
				    f:'<?php if($this->tpl_var['content']['course_files']){ ?><?php echo $this->tpl_var['content']['course_files']; ?><?php } elseif($this->tpl_var['content']['course_oggfile']){ ?><?php } elseif($this->tpl_var['content']['course_oggfile']){ ?><?php } elseif($this->tpl_var['content']['course_webmfile']){ ?><?php echo $this->tpl_var['content']['course_webmfile']; ?><?php } ?>',
				    c:0
				};
				var video=[<?php if($this->tpl_var['content']['course_files']){ ?>'<?php echo $this->tpl_var['content']['course_files']; ?>->video/mp4',<?php } ?><?php if($this->tpl_var['content']['course_oggfile']){ ?>'<?php echo $this->tpl_var['content']['course_oggfile']; ?>->video/ogg',<?php } ?><?php if($this->tpl_var['content']['course_webmfile']){ ?>'<?php echo $this->tpl_var['content']['course_webmfile']; ?>->video/webm'<?php } ?>];
				CKobject.embed('app/core/styles/js/ckplayer/ckplayer.swf','movieplatform','ckplayer_movieplatform','100%','450',false,flashvars,video);
			</script>
			<?php } ?>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>