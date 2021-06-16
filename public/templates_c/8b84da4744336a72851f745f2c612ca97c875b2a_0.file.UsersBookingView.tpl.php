<?php
/* Smarty version 3.1.33, created on 2021-06-16 19:22:53
  from 'C:\xampp\htdocs\projekt\app\views\UsersBookingView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60ca336d145978_76036983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b84da4744336a72851f745f2c612ca97c875b2a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\app\\views\\UsersBookingView.tpl',
      1 => 1623864013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ca336d145978_76036983 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130377497960ca336d130d26_29587866', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_130377497960ca336d130d26_29587866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_130377497960ca336d130d26_29587866',
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

         <h2 class="text-center thin">Twoje Rezerwacje</h2>
            
                <?php if (isset($_smarty_tpl->tpl_vars['booking']->value)) {?>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Rezerwacja pokoju</h3>
                            <p class="text-center text-muted"></p>
                            <hr>
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panelBooking">
                                
                                <input type="text" class="form-control" name="id" value="<?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['id'];?>
">
                                <div class="top-margin">
                                    <label>Rezerwacja od:<span class="text-danger">*</span></label>
                                    <input type="date" name="chceck_in_date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->chceck_in_date;?>
">
                                </div>
                                <div class="top-margin">
                                    <label>Rezerwacja do: <span class="text-danger">*</span></label>
                                     <input type="date" name="chceck_out_date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->chceck_out_date;?>
">
                                </div>
               
                                <hr>
                                <input type="submit" value="Rezerwuj" class="btn btn-primary">
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
                    <th scope="col">Id_rezerwacji</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">login</th>
                    <th scope="col">Imie Nazwisko</th>
                    <th scope="col">Numer pokoju</th>
                  
                    
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['places']->value, 'place');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
?>
                    <tr>
                     
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['booking_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['chceck_in_date'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['chceck_out_date'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['login'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['room_no'];?>
</td>




                         <td>
                         <ul class="list-unstyled">
                         <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
/hotel/<?php echo $_smarty_tpl->tpl_vars['place']->value['id'];?>
"><button class="btn btn-action">Zobacz</button></a>
                         </li>
                         </ul>         
                                
                           
                        </td>

                        <td>
                         <ul class="list-unstyled">
                         <li>
                            <a class="dropdown-item" onclick="deleteBooking('<?php echo $_smarty_tpl->tpl_vars['place']->value['booking_id'];?>
')" href="#"><button class="btn btn-action">Anuluj rezerwacje</button></a>
                       
                            </li>
                         </ul>         
                                
                           
                        </td>

                      


                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

</header>

  <article class="col-md-12 col-xs-4 maincontent">
                <div class="col-md-2 col-sm-6">
                   
                    <ul class="list-group">
                        
                    </ul>
                </div>
             
            </article>
            <!-- /Article -->



            <div class="space"> . </div>
        </div>

    </div>	




 <?php echo '<script'; ?>
>
 <?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
>
        function deleteBooking(id) {
            if (confirm("Na pewno chcesz ten pokój?")) {
                window.location.href = '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usersBooking/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
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
