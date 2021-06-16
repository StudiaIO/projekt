<?php
/* Smarty version 3.1.33, created on 2021-06-14 20:23:14
  from 'C:\xampp\htdocs\projekt\app\views\PanelView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_60c79e92a226b2_83000765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d905f4e66534e4908ebc512e61b76c4c1375ac7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\app\\views\\PanelView.tpl',
      1 => 1623694311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60c79e92a226b2_83000765 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_129877468860c79e92a12709_16335295', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_129877468860c79e92a12709_16335295 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_129877468860c79e92a12709_16335295',
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

         <h2 class="text-center thin">Pokoje</h2>
            
                <?php if (isset($_smarty_tpl->tpl_vars['booking']->value)) {?>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Rezerwacja pokoju</h3>
                            <p class="text-center text-muted"></p>
                            <hr>
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panelBooking">
                                
                                <input type="hidden" class="form-control" name="id" value="<?php echo $_smarty_tpl->tpl_vars['placeDetails']->value['id'];?>
">
                                <div class="top-margin">
                                    <label>Rezerwacja od:<span class="text-danger">*</span></label>
                                    <input type="date" name="chceck_in_date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->chceck_in_date;?>
" id="userdate" onchange="TDate()">
                                </div>
                                <div class="top-margin">
                                    <label>Rezerwacja do: <span class="text-danger">*</span></label>
                                     <input type="date" name="chceck_out_date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->chceck_out_date;?>
" id="userdate" onchange="TDate()">
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
                    <th scope="col">Podgląd</th>
                    <th scope="col">Numer</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Rodzaj</th>
                    <th scope="col">Opis</th>
                    
                  
                    
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['places']->value, 'place');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
?>
                    <tr>
                      <td>
                      <div class="col-xs-111 col-sm-4">
                      <div><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/single.jpg"></a></div>
                      </div>
                      </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['room_no'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['price'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['type'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['place']->value['description'];?>
</td>
                        
                       
                        <td>
                         <ul class="list-unstyled">
                         <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panel/<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
/booking/<?php echo $_smarty_tpl->tpl_vars['place']->value['id'];?>
"><button class="btn btn-action">Zarezerwuj</button></a>
                         </li>
                         </ul>         
                                
                           
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
                    <h4>Ilość pokoi w bazie</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><h4><?php echo $_smarty_tpl->tpl_vars['allPlaces']->value;?>
</h4></li>
                    </ul>
                </div>
             
            </article>
            <!-- /Article -->



            <div class="space"> . </div>
        </div>

    </div>	




 <?php echo '<script'; ?>
>
function TDate() {
var UserDate = document.getElementById("userdate").value;
var ToDate = new Date();
  
if (new Date(UserDate).getTime() <= ToDate.getTime()) {
    alert("Data nie może być przeszła");
    return false;
}
return true;}
 <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'intro'} */
}
