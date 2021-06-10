{extends file="main.tpl"}
{block name=intro}
    <div class="jumbotron top-space">
        <div class="container">
            <ol class="breadcrumb">
            
                <li class="active">{$page_title}</li>
            </ol>
           
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-6">
                                    <div><img src="{$conf->images}/single.jpg"></a></td></div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
 
                              <ul class="list-group" id="height">
                                      
                                        <li class="list-group-item">Numer: {$place['room_no']}</li>
                                        <li class="list-group-item">Cena: {$place['price']} PLN</li>
                                        <li class="list-group-item">Rodzaj:   {$place['type']}</li>
                                        <li class="list-group-item">Opis: {$place['description']}</li>
                                    
                                        </li>
                                        {if core\RoleUtils::inRole("admin")||("user")}
                                            <li class="list-group-item">
                                               
                                                
                                             
                                          </li>
                                        {/if}

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    
    
    
{/block}