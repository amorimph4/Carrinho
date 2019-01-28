<div class="modal fade" id="AddItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header">
    		<h5 class="modal-title" id="exampleModalLabel">Adicionar ao Carrinho</h5>
  		</div>
      <div class="modal-body">
      	<form action="{{ route('setCar') }}" class="form-horizontal" method="post">
        	@include('admin.pages.product.addItem')
	      </form>
    	</div>
  	</div>
	</div>
</div>