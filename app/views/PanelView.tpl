{extends file="main.tpl"}
{block name=intro}
    <header id="head" class="secondary"></header>
    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}main">Strona główna</a></li>
            <li class="active">{$page_title}</li>
        </ol>

         <h2 class="text-center thin">Pokoje</h2>
            
                {if isset($booking)}
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Rezerwacja pokoju</h3>
                            <p class="text-center text-muted"></p>
                            <hr>
                            <form method="post" action="{$conf->action_root}panelBooking">
                                
                                <input type="hidden" class="form-control" name="id" value="{$placeDetails['id']}">
                                <div class="top-margin">
                                    <label>Rezerwacja od:<span class="text-danger">*</span></label>
                                    <input type="date" name="chceck_in_date" value="{$form->chceck_in_date}" id="userdate" onchange="TDate()">
                                </div>
                                <div class="top-margin">
                                    <label>Rezerwacja do: <span class="text-danger">*</span></label>
                                     <input type="date" name="chceck_out_date" value="{$form->chceck_out_date}" id="userdate" onchange="TDate()">
                                </div>
               
                                <hr>
                                <input type="submit" value="Rezerwuj" class="btn btn-primary">
                            </form>
                            <hr>
                            <a href="{$conf->action_root}hotel/{$placeDetails['id']}"><button class="btn btn-action">Podgląd</button></a>
                        </div>
                    </div>
                </div>
            {/if}
        

            
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
                {foreach $places as $place}
                    <tr>
                      <td>
                      <div class="col-xs-111 col-sm-4">
                      <div><img src="{$conf->images}/single.jpg"></a></div>
                      </div>
                      </td>
                        <td>{$place['room_no']}</td>
                        <td>{$place['price']}</td>
                        <td>{$place['type']}</td>
                        <td>{$place['description']}</td>
                        
                       
                        <td>
                         <ul class="list-unstyled">
                         <li>
                            <a href="{$conf->action_root}panel/{$offset}/booking/{$place['id']}"><button class="btn btn-action">Zarezerwuj</button></a>
                         </li>
                         </ul>         
                                
                           
                        </td>

                        <td>
                         <ul class="list-unstyled">
                         <li>
                            <a href="{$conf->action_root}/hotel/{$place['id']}"><button class="btn btn-action">Zobacz</button></a>
                         </li>
                         </ul>         
                                
                           
                        </td>

                    </tr>
                {/foreach}
                </tbody>
            </table>



</header>

  <article class="col-md-12 col-xs-4 maincontent">
                <div class="col-md-2 col-sm-6">
                    <h4>Ilość pokoi w bazie</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><h4>{$allPlaces}</h4></li>
                    </ul>
                </div>
             
            </article>
            <!-- /Article -->



            <div class="space"> . </div>
        </div>

    </div>	




 <script>
function TDate() {
var UserDate = document.getElementById("userdate").value;
var ToDate = new Date();
  
if (new Date(UserDate).getTime() <= ToDate.getTime()) {
    alert("Data nie może być przeszła");
    return false;
}
return true;}
 </script>


{/block}