@extends('admin.layout.layout')

@section('content-master')
    <div class="page-wrapper">
        <nav class="navbar navbar-fixed-top" style=" background-color: #a7a7a7">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand a-car" href="{{ route('compras') }}" >Carrinho </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="" href="{{ route('getCar') }}" style="font-size: 25px;"> <i class="fas fa-cart-plus"></i> </a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <span class="fa fa-user user-icon"></span>{{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="{{ Route::is('schedule.*') ? 'active' : '' }}" style="margin-top: 75px;"><a class="" href="{{ route('categorys') }}"><i style="font-size: 35px;" class="fas fa-clipboard-list"></i> Categorias</a></li>

                        <li class="{{ Route::is('client.*') ? 'active' : '' }}"><a class="" href="{{ route('products') }}"><i style="font-size: 35px;" class="fas fa-dolly-flatbed"></i> Produtos</a></li>
                        
                        <li class="{{ Route::is('user.*') ? 'active' : '' }}"><a class="" href="{{ route('requests') }}"><i style="font-size: 35px;" class="fa fa-user"></i> Pedidos</a></li>

                        <li class="{{ Route::is('user.*') ? 'active' : '' }}"><a class="" href="{{ route('compras') }}"><i style="font-size: 35px;" class="fas fa-shopping-bag"></i> Shopping</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @if (session()->has('message'))
                        <div class="alert alert-{{ session('message')['type'] }}">
                            {{ session()->get('message')['content'] }}
                        </div>
                    @endif
                    @if ($errors->any())
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                        <div class="alert alert-danger">
                            <i class="fa fa-warning"></i> Ocorreu um problema ao processar a solicitação.
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection
