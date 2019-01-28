		{!! csrf_field() !!}

<div class="row">
	<div class="col-md-12">
	    <div class="white-box">
			<div class="form-group">
			    <label for="title" class="control-label col-sm-1">Nome</label>
			    <div class="col-sm-4 chega-pra-la">
			        <input type="text" name="name" required='true' class="form-control" value="@{{Product.name}}" >
			    </div>

			    <label for="url" class="control-label col-sm-1">Descrição</label>
			    <div class="col-sm-4 chega-pra-la">
			        <input type="text" name="description" required='true' placeholder="" class="form-control" value="@{{Product.description}}" >
			    </div>
			</div>



			<div class="form-group">
			    <label for="body" class="control-label col-sm-1">Preço</label>
			    <div class="col-sm-4 chega-pra-la">
			        <input type="text" name="cost" required='true' class="form-control" value="@{{Product.cost}}" >
			    </div>
			    <label for="body" class="control-label col-sm-1">Caracteristica</label>
			    <div class="col-sm-4 chega-pra-la">
			        <input type="text" name="feature" required='true' class="form-control" value="@{{Product.feature}}" >
			    </div>

			</div>


			<div class="form-group">
			    <label for="body" class="control-label col-sm-1">Quantidade</label>
			    <div class="col-sm-4 chega-pra-la">
			        <input type="number" min="0" name="qtd" required='true' class="form-control" value="@{{Product.qtd}}" >
			    </div>

			    <label for="body" class="control-label col-sm-1">Categoria</label>
			    <div class="col-sm-4 chega-pra-la" style="margin-left: 10px;">
		        	<select class="form-control" name="category" id="categorys-edit-@{{Product.id}}" required="true">
                  	</select>
			    </div>
			</div>

			<br>
			
			<div class="form-group" style="margin-top: 40px;">
              	<label for="body" class="control-label col-sm-2">Imagem</label>
              	<div class="col-sm-offset-3">
	              	<div class="fileinput fileinput-new" data-provides="fileinput">
		                <div class="fileinput-new thumbnail">
		                  <img  src="images/placeholder.jpg" id="image-edit-@{{Product.id}}" alt="..." style="height: 180px; width: 250px;">
		                </div>
	                	<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
		                <div>
		                  	<span class="btn btn-rose btn-round btn-file" style="margin-left: 60px;">
		                    	<span class="fileinput-new">Selecionar</span>
		                    	<span class="fileinput-exists">Substituir</span>
		                    	<input type="file" value="@{{Product.image}}" name="image">
		                  		<div class="ripple-container"></div>
		              		</span>
		                  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 57.4062px; top: 17.7344px; background-color: rgb(255, 255, 255); transform: scale(15.5077);"></div></div></a>
		                </div>
	              	</div>
              	</div>
            </div>

			<br/>
			<div class="form-group">
			    <div class="col-sm-offset-3">
			        <input type="submit" value="salvar" class="btn btn-primary">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">voltar</button>
			    </div>
			</div>
		</div>
	</div>
</div>