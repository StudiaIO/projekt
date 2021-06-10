<?php
/* Smarty version 3.1.33, created on 2021-06-08 23:55:27
  from 'G:\xampp\htdocs\projekt\app\views\AddPlaceView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60bfe74f0fc4f1_44760476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebd170f0de538eb3cd962e7d9949f234f0816ae4' => 
    array (
      0 => 'G:\\xampp\\htdocs\\projekt\\app\\views\\AddPlaceView.tpl',
      1 => 1593496371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60bfe74f0fc4f1_44760476 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_159330431960bfe74f0f3a52_01018573', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_159330431960bfe74f0f3a52_01018573 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_159330431960bfe74f0f3a52_01018573',
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
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Dodaj nowy pokój</h1>
                </header>

                <div class="col-md-6 col-sm-8 row">
                    <div class="panel panel-default">
                        <div class="panel-body" id="addingForm">
                         <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addPlace" method="post">
                                <div class="top-margin">
                                    <label>Numer <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="room_no" placeholder="Numer pokoju" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->room_no;?>
">
                                </div>
                                <div class="top-margin">
                                    <label>Cena <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="price" placeholder="Cena w PLN" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->price;?>
">
                                </div>

                                <div class="form-group top-margin">
                                    <label for="type">Rodzaj<span class="text-danger">*</span></label>
                                    <select class="form-control" name="type">
                                        <option value="single">Single</option>
                                        <option value="double">Double</option>
                                        <option value="studio">Studio</option>
                                        <option value="apartament">apartament</option>
                                    </select>
                                </div>

                                
                                 

                                <div class="form-group">
                                    <label for="description">Opis (nie wymagane)</label>
                                    <textarea class="form-control" rows="3" name="description" id="description"><?php echo $_smarty_tpl->tpl_vars['form']->value->description;?>
</textarea>
                                </div>
                               
                                <tr>	
		<th>Image</th>
		<td><input type="file" name="image"  class="form-control"/>
		</td>
	</tr>
                             


                                <hr>

                                <div class="row">
                                    <div class="col-lg-1 text-right">
                                        

                                        <input type="submit" class="btn btn-primary" type="submit" value="Dodaj" name="add"/>
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
