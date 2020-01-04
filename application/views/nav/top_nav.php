<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
			data-target="#navbar-url" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo $this->lang->line('system_system_name'); ?></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-url">
			<ul class="nav navbar-nav">
				<li class=""><?php echo anchor('create', 'CREATE');?><span class="sr-only">(current)</span></li>
			</ul>
		</div><!--/.navbar-collapse -->
	</div>
</nav>
</div>
<div class="container theme-showcase" role="main">