<?php
/* Smarty version 3.1.33, created on 2021-06-01 22:10:35
  from 'G:\xampp\htdocs\projekt\app\views\SignInView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60b6943b85f5d3_80220418',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54d2f3d18217ffbd41489ecb54fe7048c11b1ebe' => 
    array (
      0 => 'G:\\xampp\\htdocs\\projekt\\app\\views\\SignInView.tpl',
      1 => 1591858784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b6943b85f5d3_80220418 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122333148260b6943b858b43_42271111', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_122333148260b6943b858b43_42271111 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_122333148260b6943b858b43_42271111',
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
                                        <button class="btn btn-action" type="submit">Zaloguj</button>
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
