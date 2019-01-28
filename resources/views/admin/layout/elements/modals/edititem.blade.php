<div class="modal fade" id="UpdateItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header">
    		<h5 class="modal-title" id="exampleModalLabel">Alterar Quantidade</h5>
  		</div>
      <div class="modal-body">
      	<form action="{{ route('editCar') }}" class="form-horizontal" method="post">
              {!! csrf_field() !!}

              <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                    	<div class="form-group">
	                  		<h4>Editar @{{Product.product}} </h4>
	                    	<label for="title" class="control-label col-sm-1">Qtd</label>
						    <div class="col-sm-2">
						        <input type="number" min="1" required="true" value="@{{Product.qtd}}" max="@{{Product.qtd}}" name="qtd" class="form-control">
						    </div>
                    	</div>
                      	<input type="hidden" name="product" value="@{{Product.product}}">
                      	<input type="hidden" name="id" value="@{{Product.id}}"> 
                    </div>
                    
                    <br/>
                    <div class="form-group">
                        <div class="col-sm-offset-3">
                            <input type="submit" value="Confirmar" class="btn btn-primary">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
	      </form>
    	</div>
  	</div>
	</div>
</div>