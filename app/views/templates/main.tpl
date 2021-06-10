<!DOCTYPE HTML>
<html lang="pl">
<head>
	<title>{$page_title}</title>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
<link rel="stylesheet" type="text/css" href="{$conf->styles}/the-datepicker.css">
        <link rel="stylesheet" type="text/css" href="{$conf->styles}/css_anchor_gallery.css">
	<link rel="stylesheet" type="text/css" href="{$conf->styles}/alertify.css">
	<link rel="shortcut icon" href="{$conf->images}/gt_favicon.png">
        <link rel="stylesheet" href="{$conf->styles}/bootstrap.min.css">
	<link rel="stylesheet" href="{$conf->styles}/font-awesome.min.css">
	<link rel="stylesheet" href="{$conf->styles}/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="{$conf->styles}/main.css">
	<link rel="stylesheet" href="{$conf->styles}/additional.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="{$conf->scripts}/the-datepicker.js"></script>
	<script type="text/javascript" src="{$conf->scripts}/alertify.js"></script>
	<script type="text/javascript" src="{$conf->scripts}/ajax-functions.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<div class="home">
		<!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
			<div class="container">
				<div class="navbar-header">
					<!-- Button for smallest screens -->
					
					<a class="navbar-brand" href="{$conf->action_root}main">
						
						Hotel Marmur
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li class="active"><a href="{$conf->action_root}main">Strona główna</a></li>
						{if !core\RoleUtils::inRole("logged")}
							<li><a href="{$conf->action_root}login">Zaloguj</a></li>
							<li><a class="btn" href="{$conf->action_root}register">Rejestracja</a></li>
						{/if}
						{if core\RoleUtils::inRole("logged")}
							<li class="dropdown">
								<a class="dropdown-toggle btn" data-toggle="dropdown">Opcje<b class="caret"></b></a>
								<ul class="dropdown-menu">
                                                                        {if core\RoleUtils::inRole("user")}
                                                                        <li><a href="{$conf->action_root}usersBooking">Twoje Rezerwacje</a></li>
                                                                        {/if}
									<li><a href="{$conf->action_root}panel">Panel główny</a></li>
                                                                        
									{if core\RoleUtils::inRole("admin") || core\RoleUtils::inRole("moderator")}
                                                                        <li><a href="{$conf->action_root}addPlace">Dodaj pokój</a></li>
									<li><a href="{$conf->action_root}managePlaces">Edytuj pokoje</a></li>
                                                                        <li><a href="{$conf->action_root}usersBooking">Rezerwacje</a></li>
                                                                        <li><a href="{$conf->action_root}manageUsers">Edytuj użytkowników</a></li>
                                                                          
                                                                        {/if}
									{if core\RoleUtils::inRole("admin")}
										
										
									
									{/if}
									<li><a href="{$conf->action_root}logout">Wyloguj</a></li>
								</ul>
							</li>
						{/if}
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
		<!-- /.navbar -->
	</div>

	<!-- Head -->
	{block name=head}{/block}

	<!-- Intro -->
	{block name=intro}{/block}
	<!-- Jumbotron -->
	{block name=jumbotron}{/block}

	{block name=generated}{/block}

	<footer id="footer" class="top-space always-bottom">
		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Kontakt</h3>
						<?php echo 'PHP version: ' . phpversion(); />
						<div class="widget-body">
						

						
						</div>
					</div>

					<div class="col-md-3 widget">

					</div>

					<div class="col-md-6 widget">
						
						<div class="widget-body">
							
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="{$conf->action_root}main">Strona Główna</a> |
								{if !core\RoleUtils::inRole("logged")}
									<a href="{$conf->action_root}login">Zaloguj</a> |
									<a href="{$conf->action_root}register">Zarejestruj</a>
								{/if}
								{if core\RoleUtils::inRole("logged")}
									<a href="{$conf->action_root}logout">Wyloguj</a>
								{/if}
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>

	{block name=alerts}
			{if $msgs->isError()}
				<script type="text/javascript">
				{foreach $msgs->getMessages() as $msg}
					alertify.error("{$msg->text}");
				{/foreach}
				</script>
			{/if}

			{if $msgs->isInfo()}
				<script type="text/javascript">
					{foreach $msgs->getMessages() as $msg}
					alertify.success("{$msg->text}");
					{/foreach}
				</script>
			{/if}
	{/block}

	<script src="{$conf->scripts}/headroom.min.js"></script>
	<script src="{$conf->scripts}/jQuery.headroom.min.js"></script>
	<script src="{$conf->scripts}/template.js"></script>

</body>
</html>
