@component('admin.layout.elements.body')
    @slot('Controller')<div ng-controller="ShoppingCtrl">@endslot
    @slot('edit')@include('admin.layout.elements.modals.edititem')@endslot
    @slot('delete')@include('admin.layout.elements.modals.deleteitem')@endslot
    @slot('EndController')</div>@endslot

    @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
    @elseif (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="Shopping-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product['product'] }}</td>
                        <td>{{ $product['qtd'] }}</td>
                        <td class="" style="width:230px;">
                            <div class="form-group">                
                                <a href="#" ng-click="editItem( {{ $product['id'] }} )" class="btn btn-default pull-left">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a ng-click="removeItem( {{ $product['id'] }} )" class="btn btn-danger">X</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div class="pull-right">
                Total R$ {{ $costTotal }}
                <br>
                <a href="{{ route('storeCar') }}" class="btn btn-info btn-round">Completar Compra<i class="material-icons">keyboard_arrow_right</i></a> 
            </div>
        </div>
    </div>
@endcomponent
