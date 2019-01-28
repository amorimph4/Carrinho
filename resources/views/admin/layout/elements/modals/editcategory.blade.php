<div class="modal fade" id="CategoryEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header">
    		<h5 class="modal-title" id="exampleModalLabel">Cadastro De Categoria</h5>
  		</div>
      <div class="modal-body">
      	<form action="category/update/@{{Category.id}}" class="form-horizontal" method="post">
        	@include('admin.pages.category.form')
	      </form>
    	</div>
  	</div>
	</div>
</div>