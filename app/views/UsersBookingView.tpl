{extends file="main.tpl"}
{block name=intro}
    <header id="head" class="secondary"></header>
    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}main">Strona główna</a></li>
            <li class="active">{$page_title}</li>
        </ol>

         <h2 class="text-center thin">Twoje Rezerwacje</h2>
            
                {if isset($booking)}
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Rezerwacja pokoju</h3>
                            <p class="text-center text-muted"></p>
                            <hr>
                            <form method="post" action="{$conf->action_root}panelBooking">
                                
                                <input type="text" class="form-control" name="id" value="{$placeDetails['id']}">
                                <div class="top-margin">
                                    <label>Rezerwacja od:<span class="text-danger">*</span></label>
                                    <input type="date" name="chceck_in_date" value="{$form->chceck_in_date}">
                                </div>
                                <div class="top-margin">
                                    <label>Rezerwacja do: <span class="text-danger">*</span></label>
                                     <input type="date" name="chceck_out_date" value="{$form->chceck_out_date}">
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
                    <th scope="col">Id_rezerwacji</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">login</th>
                    <th scope="col">Imie Nazwisko</th>
                    <th scope="col">Numer pokoju</th>
                  
                    
                </tr>
                </thead>
                <tbody>
                {foreach $places as $place}
                    <tr>
                     
                        <td>{$place['booking_id']}</td>
                        <td>{$place['chceck_in_date']}</td>
                        <td>{$place['chceck_out_date']}</td>
                        <td>{$place['login']}</td>
                        <td>{$place['name']}</td>
                        <td>{$place['room_no']}</td>




                         <td>
                         <ul class="list-unstyled">
                         <li>
                            <a href="{$conf->action_root}/hotel/{$place['id']}"><button class="btn btn-action">Zobacz</button></a>
                         </li>
                         </ul>         
                                
                           
                        </td>

                        <td>
                         <ul class="list-unstyled">
                         <li>
                            <a class="dropdown-item" onclick="deleteBooking('{$place['booking_id']}')" href="#"><button class="btn btn-action">Anuluj rezerwacje</button></a>
                       
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
                   
                    <ul class="list-group">
                        
                    </ul>
                </div>
             
            </article>
            <!-- /Article -->



            <div class="space"> . </div>
        </div>

    </div>	




 <script>
 </script>
 <script>
        function deleteBooking(id) {
            if (confirm("Na pewno chcesz ten pokój?")) {
                window.location.href = '{$conf->action_root}usersBooking/{$offset}/delete/'+id;
            }
        }

        function doNothing(){ return false; }
    </script>
{/block}