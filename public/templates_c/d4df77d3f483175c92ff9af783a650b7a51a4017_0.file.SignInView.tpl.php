<?php
/* Smarty version 3.1.33, created on 2021-06-16 17:56:42
  from 'C:\xampp\htdocs\projekt\app\views\SignInView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60ca1f3aaa48e7_08500363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4df77d3f483175c92ff9af783a650b7a51a4017' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\app\\views\\SignInView.tpl',
      1 => 1623858999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ca1f3aaa48e7_08500363 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207107173460ca1f3aa275c5_88128088', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_207107173460ca1f3aa275c5_88128088 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_207107173460ca1f3aa275c5_88128088',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <header id="head" class="secondary"></header>
    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Strona główna</a></li>
            <li class="active"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
          
                <header class="page-header">
                    <h1 class="page-title">Zaloguj się</h1>
                </header>

              
                    
                        <div class="panel-body">
                            
             
                            <hr>

                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
                                <div class="top-margin">
                                    <label>Login <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="login">
                                </div>
                                <div class="top-margin">
                                    <label>Hasło <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password">
                                </div>

                                <hr>

                                <div class="row">
                                 
                                    <div class="col-lg-8">
                                        
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" type="submit" name="zaloguj">Zaloguj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </article>
            <!-- /Article -->

            <div class="space"> . </div>
        </div>

    </div>	<!-- /container -->

<?php
}
}
/* {/block 'intro'} */
}
