<?php
/* Smarty version 3.1.33, created on 2021-06-16 18:54:13
  from 'C:\xampp\htdocs\projekt\app\views\BookingView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60ca2cb5eb4548_81416295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b464c5cb9fa4988d0cabf7bb843809d57a70de5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\app\\views\\BookingView.tpl',
      1 => 1623694311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ca2cb5eb4548_81416295 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21049815660ca2cb5ea87d3_41616140', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_21049815660ca2cb5ea87d3_41616140 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_21049815660ca2cb5ea87d3_41616140',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="jumbotron top-space">
        <div class="container">
            <ol class="breadcrumb">
            
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</li>
            </ol>
           
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-6">
                                    <div><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/single.jpg"></a></td></div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
 
                              <ul class="list-group" id="height">
                                      
                                        <li class="list-group-item">Numer: <?php echo $_smarty_tpl->tpl_vars['place']->value['room_no'];?>
</li>
                                        <li class="list-group-item">Cena: <?php echo $_smarty_tpl->tpl_vars['place']->value['price'];?>
 PLN</li>
                                        <li class="list-group-item">Rodzaj:   <?php echo $_smarty_tpl->tpl_vars['place']->value['type'];?>
</li>
                                        <li class="list-group-item">Opis: <?php echo $_smarty_tpl->tpl_vars['place']->value['description'];?>
</li>
                                    
                                        </li>
                                        <?php if (core\RoleUtils::inRole("admin") || ("user")) {?>
                                            <li class="list-group-item">
                                               
                                                
                                             
                                          </li>
                                        <?php }?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    
    
    
<?php
}
}
/* {/block 'intro'} */
}
