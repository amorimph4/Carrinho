		{!! csrf_field() !!}
<div class="row">
	<div class="col-md-12">
	    <div class="white-box">
			<div class="form-group">
			    <label for="title" class="control-label col-sm-2">Nome</label>
			    <div class="col-sm-8">
			        <input type="text" name="name" required='true' placeholder="" id="title" class="form-control" value="@{{ Category.name }}" >
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