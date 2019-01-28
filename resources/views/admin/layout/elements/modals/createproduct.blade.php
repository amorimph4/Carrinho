<div class="modal fade" id="ProductCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header">
    		<h5 class="modal-title" id="exampleModalLabel">Cadastro De Produto</h5>
  		</div>
      <div class="modal-body">
      	<form action="{{ route('store-product') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        	@include('admin.pages.product.form')
	      </form>
    	</div>
  	</div>
	</div>
</div>