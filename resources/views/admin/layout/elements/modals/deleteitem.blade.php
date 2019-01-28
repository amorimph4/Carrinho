<div class="modal fade" id="RemoveItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header">
    		<h5 class="modal-title" id="exampleModalLabel">Remover item do Carrinho ?</h5>
  		</div>
      <div class="modal-body">
      	<form action="{{ route('deleteToCar') }}" class="form-horizontal" method="post">
              {!! csrf_field() !!}

              <div class="row">
                <div class="col-md-12">
                  <h4>Deseja mesmo remover @{{Product.name}} </h4>
                    <div class="white-box">
                      <input type="hidden" name="product" value="@{{Product.name}}">
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