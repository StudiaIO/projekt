{extends file="main.tpl"}
{block name=intro}
    <header id="head" class="secondary"></header>
    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}main">Strona główna</a></li>
            <li class="active">{$page_title}</li>
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
                         <form action="{$conf->action_root}addPlace" method="post">
                                <div class="top-margin">
                                    <label>Numer <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="room_no" placeholder="Numer pokoju" value="{$form->room_no}">
                                </div>
                                <div class="top-margin">
                                    <label>Cena <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="price" placeholder="Cena w PLN" value="{$form->price}">
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
                                    <textarea class="form-control" rows="3" name="description" id="description">{$form->description}</textarea>
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

             
              
               
{/block}