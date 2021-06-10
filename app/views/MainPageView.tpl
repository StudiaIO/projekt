{extends file="main.tpl"}
{block name=head}
    <header id="head">
        <div class="container">
            <div class="row">
                <h1 class="lead">Witaj w Hotelu Marmur</h1>
                
                <p><a class="btn btn-default btn-lg" role="button" href="{$conf->action_root}panel">Szukaj noclegu</a></p>
            </div>
        </div>

    </header>
{/block}

{block name=intro}
    <div class="container text-center">
       
     
                 <td>&nbsp</td>
	
	<tr>
		<td height="500" style="background-color:#00000">
		<table width="900" border="3" cellspacing="12">
		<tr>
			<td><a href="{$conf->images}/single.jpg">
			<img src="{$conf->images}/single.jpg" width="250" height="188"></a></td>
			<td><a href="{$conf->images}/double.jpg">
			<img src="{$conf->images}/double.jpg" width="250" height="188"></a></td>
			<td><a href="{$conf->images}/studio.jpg">
			<img src="{$conf->images}/studio.jpg" width="250" height="188"></a></td>
                        <td><a href="{$conf->images}/apartment.jpg">
			<img src="{$conf->images}/apartment.jpg" width="250" height="188"></a></td>
		</tr>
		<tr>
			<td>Single</td>
			<td>Double</td>
			<td>Studio</td>
                        <td>Apartment</td>
		</tr>
	
		</table></td>
		</tr>
	</table>
</div>
       
    </div>
{/block}

{block name=jumbotron}
    <div class="jumbotron top-space">
        <div class="container">

            

      
                
              
               
              
               
            

        </div>
    </div>

   

        

      



 


   
  

{/block}
