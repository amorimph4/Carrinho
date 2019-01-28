@component('admin.layout.elements.body')
    @slot('description') Administração de pacientes @endslot
    @slot('Controller')<div ng-controller="ShoppingCtrl">@endslot
    @slot('include')@include('admin.layout.elements.modals.additem')@endslot
    @slot('edit')@include('admin.layout.elements.modals.confirmrequest')@endslot
    @slot('EndController')</div>@endslot

	<div class="card">
		<div class="card-body">
		  <div class="table-responsive">
		    <table class="table table-shopping" id="Shopping-table">
		      <thead>
		        <tr>
		          <th>Product</th>
		          <th class="th-description">Nome</th>
		          <th class="th-description">Descrição</th>
		          <th class="text-right">Preço</th>
		          <th class="text-right">Estoque</th>
		          <th></th>
		        </tr>
		      </thead>
		      <tbody>
		      	@foreach($pages as $page)
		        <tr>
		          <td>
		            <div class="img-container">
		              <img  @if($page->image ) src="images/{{ $page->image }}" @else src="images/placeholder.jpg" @endif alt="..." style="height: 50px;">
		            </div>
		          </td>
		          <td class="td-name"><a href="#{{ $page->name }}">{{ $page->name }}</a></td>
		          <td>{{ $page->description }}</td>
		          <td>{{ $page->cost }}</td>
		          <td class="td-number text-right">{{ $page->qtd }}</td>

		          <td class="td-number">
		            <div class="form-group" style="margin-left: 135px;">
	                    <a href="#" ng-click="addProduct( {{ $page->id }} )" class="btn btn-default">
	                        <i class="fas fa-shopping-cart"></i>
	                    </a>
	                </div>
		          </td>
		        </tr>
		        @endforeach
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>
@endcomponent