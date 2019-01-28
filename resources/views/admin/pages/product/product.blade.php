@component('admin.layout.elements.body')
    @slot('title')   Produtos <a ng-click="createProduct()" class="btn btn-primary"><i class="fas fa-plus"></i></a> @endslot
    @slot('description') Administração de pacientes @endslot
    @slot('Controller')<div ng-controller="ProductCtrl">@endslot
    @slot('include')@include('admin.layout.elements.modals.createproduct')@endslot
    @slot('edit')@include('admin.layout.elements.modals.editproduct')@endslot
    @slot('delete')@include('admin.layout.elements.modals.deleteproduct')@endslot
    @slot('EndController')</div>@endslot

    @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
    @elseif (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif

    <table id="Product-table" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Custo</th>
            <th>Qtd</th>
            <th class="text-right">ações</th>
        </tr>

        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td><img  @if($page->product->image ) src="images/{{ $page->product->image }}" @else src="images/placeholder.jpg" @endif alt="..." style="height: 50px;"></td>
            <td>{{ $page->category->name }}</td>
            <td>{{ $page->product->name }}</td>
            <td>{{ $page->product->description }}</td>
            <td>{{ $page->product->cost }}</td>
            <td>{{ $page->product->qtd }}</td>
            <td>
                <div class="form-group" style="margin-left: 135px;">
                    <a href="#" ng-click="editProduct( {{ $page->product->id }} )" class="btn btn-default">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a ng-click="preparedeleteProduct( {{ $page->product->id }} )" class="btn btn-danger">X</a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endcomponent
