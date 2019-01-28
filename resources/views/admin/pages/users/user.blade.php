@component('admin.layout.elements.body')
    @slot('title')   Usuários @can('route-permission', 6) <a  ng-click="createUser()" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span></a> @endcan @endslot
    @slot('description') Administração de pacientes @endslot
    @slot('Controller')<div ng-controller="UserCtrl">@endslot
    @slot('include')@include('admin.layout.elements.modals.createuser')@endslot
    @slot('edit')@include('admin.layout.elements.modals.edituser')@endslot
    @slot('delete')@include('admin.layout.elements.modals.deleteuser')@endslot
    @slot('EndController')</div>@endslot

    <table id="user-table" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Cargo</th>
            <th>Grupo</th>
            <th class="text-right">ações</th>

        </tr>

        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->name }}</td>
            <td>{{ $page->email }}</td>
            <td>{{ $page->office }}</td>
            <td>{{ $page->group }}</td>
            <td class="">
                @can('route-permission', 7) <a href="#" ng-click="editUser( {{ $page->id }} )" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> @endcan
                @can('route-permission', 8)<a ng-click="preparedeleteUser( {{ $page->id }} )" class="btn btn-danger">X</a>@endcan
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endcomponent
