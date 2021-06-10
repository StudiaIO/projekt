{extends file="main.tpl"}
{block name=intro}
    <div class="jumbotron top-space">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{$conf->action_root}main">Strona główna</a></li>
                <li class="active">{$page_title}</li>
            </ol>
            <h2 class="text-center thin">Pokoje</h2>
            
             {if isset($edit)}
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Edycja pokoju</h3>
                            <p class="text-center text-muted"></p>
                            <hr>
                            <form method="post" action="{$conf->action_root}placeEdit">
                                <input type="hidden" class="form-control" name="id" value="{$placeDetails['id']}">
                                <div class="top-margin">
                                    <label>Numer pokoju <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="room_no" placeholder="Numer pokoju" value="{$placeDetails['room_no']}">
                                </div>
                                <div class="top-margin">
                                    <label>Cena <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="price" placeholder="Cena w PLN" value="{$placeDetails['price']}">
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
                                    <textarea class="form-control" rows="3" name="description" id="description">{$placeDetails['description']}</textarea>
                                </div>

                                <hr>
                                <input type="submit" value="Edytuj" class="btn btn-primary">
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
                {foreach $places as $place}
                    <tr>
                        <th scope="row">{$place['id']}</th>
                        <td>{$place['room_no']}</td>
                        <td>{$place['price']}</td>
                        <td>{$place['type']}</td>
                        <td>{$place['description']}</td>
                        <td>{$place['login']}</td>
                       
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{$conf->action_root}/hotel/{$place['id']}">Podgląd</a></li>
                                    
                                    <li><a class="dropdown-item" href="{$conf->action_root}managePlaces/{$offset}/edit/{$place['id']}">Edytuj</a></li>
                                    <li><a class="dropdown-item" onclick="deletePlace('{$place['id']}')" href="#">Usuń</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>

            
            
        </div>
    </div>
    <script>
    
    </script>

    <script>
        function deletePlace(id) {
            if (confirm("Na pewno chcesz ten pokój?")) {
                window.location.href = '{$conf->action_root}managePlaces/{$offset}/delete/'+id;
            }
        }

        function doNothing(){ return false; }
    </script>
{/block}