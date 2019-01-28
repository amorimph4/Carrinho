@component('admin.layout.elements.body')
    @slot('title')   Categorias <a ng-click="createCategory()" class="btn btn-primary"><i class="fas fa-plus"></i></a> @endslot
    @slot('description')  @endslot
    @slot('Controller')<div ng-controller="CategoryCtrl">@endslot
    @slot('include')@include('admin.layout.elements.modals.createcategory')@endslot
    @slot('edit')@include('admin.layout.elements.modals.editcategory')@endslot
    @slot('delete')@include('admin.layout.elements.modals.deletecategory')@endslot
    @slot('EndController')</div>@endslot

    @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
    @elseif (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    
    <table id="Category-table" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>ações</th>
        </tr>

        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->name }}</td>
            <td class="" style="width:230px;">
                <div class="form-group">                
                    <a href="#" ng-click="editCategory( {{ $page->id }} )" class="btn btn-default pull-left">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a ng-click="preparedeleteCategory( {{ $page->id }} )" class="btn btn-danger">X</a>
                </div>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>

@endcomponent
