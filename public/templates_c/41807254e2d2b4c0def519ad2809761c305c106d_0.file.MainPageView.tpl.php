<?php
/* Smarty version 3.1.33, created on 2021-06-10 01:37:05
  from 'G:\xampp\htdocs\projekt\app\views\MainPageView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60c150a1f41668_55107010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41807254e2d2b4c0def519ad2809761c305c106d' => 
    array (
      0 => 'G:\\xampp\\htdocs\\projekt\\app\\views\\MainPageView.tpl',
      1 => 1623281824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60c150a1f41668_55107010 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21998899660c150a1f36f64_87627362', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_29278026860c150a1f3bcf5_68505698', 'intro');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192130617160c150a1f40dc3_15465042', 'jumbotron');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'head'} */
class Block_21998899660c150a1f36f64_87627362 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_21998899660c150a1f36f64_87627362',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <header id="head">
        <div class="container">
            <div class="row">
                <h1 class="lead">Witaj w Hotelu Marmur</h1>
                
                <p><a class="btn btn-default btn-lg" role="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panel">Szukaj noclegu</a></p>
            </div>
        </div>

    </header>
<?php
}
}
/* {/block 'head'} */
/* {block 'intro'} */
class Block_29278026860c150a1f3bcf5_68505698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_29278026860c150a1f3bcf5_68505698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container text-center">
       
     
                 <td>&nbsp</td>
	
	<tr>
		<td height="500" style="background-color:#00000">
		<table width="900" border="3" cellspacing="12">
		<tr>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/single.jpg">
			<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/single.jpg" width="250" height="188"></a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/double.jpg">
			<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/double.jpg" width="250" height="188"></a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/studio.jpg">
			<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/studio.jpg" width="250" height="188"></a></td>
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/apartment.jpg">
			<img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/apartment.jpg" width="250" height="188"></a></td>
		</tr>
		<tr>
			<td>Single</td>
			<td>Double</td>
			<td>Studio</td>
                        <td>Apartment</td>
		</tr>
	
		</table></td>
		</tr>
	</table>
</div>
       
    </div>
<?php
}
}
/* {/block 'intro'} */
/* {block 'jumbotron'} */
class Block_192130617160c150a1f40dc3_15465042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'jumbotron' => 
  array (
    0 => 'Block_192130617160c150a1f40dc3_15465042',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="jumbotron top-space">
        <div class="container">

            

      
                
              
               
              
               
            

        </div>
    </div>

   

        

      



 


   
  

<?php
}
}
/* {/block 'jumbotron'} */
}
