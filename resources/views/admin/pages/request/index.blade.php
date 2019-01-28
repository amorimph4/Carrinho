@component('admin.layout.elements.body')
    @slot('Controller')<div ng-controller="ShoppingCtrl">@endslot
    @slot('edit')@include('admin.layout.elements.modals.showOrder')@endslot
    @slot('title')   Pedidos @endslot
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
                        <th>#</th>
                        <th>Quantidade Items</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>

                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->qtd }}</td>
                                <td>{{ $page->value }}</td>
                                <td> <a href="#" ng-click="listItems( {{ $page->id }} )" class="btn btn-default pull-left"><i style="font-size: 20px;" class="fas fa-clipboard-list"></i></a>   
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endcomponent
