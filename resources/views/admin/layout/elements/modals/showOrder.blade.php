<div class="modal fade" id="ListOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header">
    		<h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
  		</div>
      	<div class="modal-body">
      		<table class="table table-shopping">
		      <thead>
		        <tr>
		          <th>Product</th>
		          <th class="th-description">Preço</th>
		          <th class="th-description">Quantidade</th>
		        </tr>
		      </thead>
		      <tbody ng-repeat="value in Request">
		        <tr>
		          <td>@{{ value.name }}</td>
		          <td>@{{ value.cost }}</td>
		          <td>@{{ value.qtd }}</td>
		        </tr>
		      </tbody>
		    </table>
    	</div>
    	<div class="form-group">
		    <div class="col-sm-offset-3">
		        <input type="submit" value="salvar" class="btn btn-primary">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">voltar</button>
		    </div>
		</div>
  	</div>
	</div>
</div>