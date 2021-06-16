<?php
/* Smarty version 3.1.33, created on 2021-06-16 18:40:03
  from 'C:\xampp\htdocs\projekt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60ca2963594e92_94608282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2f83f0df776d3fb4488d16fe3b1be60df353f2b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\app\\views\\templates\\main.tpl',
      1 => 1623861602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ca2963594e92_94608282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
	
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/the-datepicker.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/css_anchor_gallery.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/alertify.css">
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/gt_favicon.png">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/main.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->styles;?>
/additional.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->scripts;?>
/the-datepicker.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->scripts;?>
/alertify.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->scripts;?>
/ajax-functions.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>
</head>
<body>
	<div class="home">
		<!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
			<div class="container">
				<div class="navbar-header">
					<!-- Button for smallest screens -->
					
					<a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">
						
						Hotel Marmur
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Strona główna</a></li>
						<?php if (!core\RoleUtils::inRole("logged")) {?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" name="loguj">Zaloguj</a></li>
							<li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" name="rejestruj">Rejestracja</a></li>
						<?php }?>
						<?php if (core\RoleUtils::inRole("logged")) {?>
							<li class="dropdown">
								<a class="dropdown-toggle btn" data-toggle="dropdown">Opcje<b class="caret"></b></a>
								<ul class="dropdown-menu">
                                                                        <?php if (core\RoleUtils::inRole("user")) {?>
                                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usersBooking">Twoje Rezerwacje</a></li>
                                                                        <?php }?>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panel">Panel główny</a></li>
                                                                        
									<?php if (core\RoleUtils::inRole("admin") || core\RoleUtils::inRole("moderator")) {?>
                                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addPlace">Dodaj pokój</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managePlaces">Edytuj pokoje</a></li>
                                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usersBooking">Rezerwacje</a></li>
                                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageUsers">Edytuj użytkowników</a></li>
                                                                          
                                                                        <?php }?>
									<?php if (core\RoleUtils::inRole("admin")) {?>
										
										
									
									<?php }?>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a></li>
								</ul>
							</li>
						<?php }?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
		<!-- /.navbar -->
	</div>

	<!-- Head -->
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168950196960ca2963588148_49238854', 'head');
?>


	<!-- Intro -->
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94299757660ca2963588a14_79963888', 'intro');
?>

	<!-- Jumbotron -->
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193952392460ca2963589028_96255373', 'jumbotron');
?>


	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_70644524360ca29635895d5_01790341', 'generated');
?>


	<footer id="footer" class="top-space always-bottom">
		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Kontakt</h3>
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
								<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Strona Główna</a> |
								<?php if (!core\RoleUtils::inRole("logged")) {?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Zaloguj</a> |
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register">Zarejestruj</a>
								<?php }?>
								<?php if (core\RoleUtils::inRole("logged")) {?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a>
								<?php }?>
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

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124567038660ca296358c352_42467919', 'alerts');
?>


	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->scripts;?>
/headroom.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->scripts;?>
/jQuery.headroom.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->scripts;?>
/template.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
/* {block 'head'} */
class Block_168950196960ca2963588148_49238854 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_168950196960ca2963588148_49238854',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'intro'} */
class Block_94299757660ca2963588a14_79963888 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_94299757660ca2963588a14_79963888',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'intro'} */
/* {block 'jumbotron'} */
class Block_193952392460ca2963589028_96255373 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'jumbotron' => 
  array (
    0 => 'Block_193952392460ca2963589028_96255373',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'jumbotron'} */
/* {block 'generated'} */
class Block_70644524360ca29635895d5_01790341 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'generated' => 
  array (
    0 => 'Block_70644524360ca29635895d5_01790341',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'generated'} */
/* {block 'alerts'} */
class Block_124567038660ca296358c352_42467919 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'alerts' => 
  array (
    0 => 'Block_124567038660ca296358c352_42467919',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
				<?php echo '<script'; ?>
 type="text/javascript">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
					alertify.error("<?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
");
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php echo '</script'; ?>
>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
				<?php echo '<script'; ?>
 type="text/javascript">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
					alertify.success("<?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
");
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php echo '</script'; ?>
>
			<?php }?>
	<?php
}
}
/* {/block 'alerts'} */
}
