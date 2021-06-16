<?php
/* Smarty version 3.1.33, created on 2021-06-16 20:03:35
  from 'C:\xampp\htdocs\projekt\app\views\ManageRoomView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60ca3cf7c4f2d6_47643046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eda60aa5c0794388d76e7bd5d221c2df4412058' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\app\\views\\ManageRoomView.tpl',
      1 => 1623694311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ca3cf7c4f2d6_47643046 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_93423833060ca3cf7c3dd45_34980102', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_93423833060ca3cf7c3dd45_34980102 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_93423833060ca3cf7c3dd45_34980102',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="jumbotron top-space">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Strona główna</a></li>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</li>
            </ol>
            <h2 class="text-center thin">Pokoje</h2>
            
             <?php if (isset($_smarty_tpl->tpl_vars['edit']->value)) {?>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Edycja pokoju</h3>
                            <p class="text-center text-muted"></p>
                            <hr>
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
placeEdit">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['id'];?>
">
                                <div class="top-margin">
                                    <label>Numer pokoju <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="room_no" placeholder="Numer pokoju" value="<?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['room_no'];?>
">
                                </div>
                                <div class="top-margin">
                                    <label>Cena <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="price" placeholder="Cena w PLN" value="<?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['price'];?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="type">Rodzaj<span class="text-danger">*</span></label>
                                    <select class="form-control" name="type">
                                        <option value="single">Single</option>
                                        <option value="double">Double</option>
                                        <option value="studio">Studio</option>
                                        <option value="apartament">apartament</option>
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="description">Opis </label>
                                    <textarea class="form-control" rows="3" name="description" id="description"><?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['description'];?>
</textarea>
                                </div>

                                <hr>
                                <input type="submit" value="Edytuj" class="btn btn-primary">
                            </form>
                            <hr>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
hotel/<?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['id'];?>
"><button class="btn btn-action">Podgląd</button></a>
                        </div>
                    </div>
                </div>
            <?php }?>
            <table id="placesValues" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Numer</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Rodzaj</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Dodał</th>
                  
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['places']->value, 'place');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
?>
                    <tr>
                        <th scope="row"><?php echo $_smarty_tpl->tpl_vars['place']->value['id'];?>
</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['room_no'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['price'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['type'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['description'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['login'];?>
</td>
                       
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
/hotel/<?php echo $_smarty_tpl->tpl_vars['place']->value['id'];?>
">Podgląd</a></li>
                                    
                                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managePlaces/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['place']->value['id'];?>
">Edytuj</a></li>
                                    <li><a class="dropdown-item" onclick="deletePlace('<?php echo $_smarty_tpl->tpl_vars['place']->value['id'];?>
')" href="#">Usuń</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

            
            
        </div>
    </div>
    <?php echo '<script'; ?>
>
    
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        function deletePlace(id) {
            if (confirm("Na pewno chcesz ten pokój?")) {
                window.location.href = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
managePlaces/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
/delete/'+id;
            }
        }

        function doNothing(){ return false; }
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'intro'} */
}
