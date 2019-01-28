@extends('admin.layout.page')

@section('content')
	
    {{$Controller ?? ''}}
    <div class="row">
 	</div>
 	
    	<div class="clearfix"></div>
	    
	        <div class="panel-body" style="margin-top: 70px;">
    			<h3>{{ $title ?? ''}}</h3>
	            {{ $slot }}
	        </div>
    
	    {{$include ?? ''}}
	    {{$edit ?? ''}}
	    {{$confirm ?? ''}}
	    {{$delete ?? ''}}
    {{$EndController ?? ''}}


@endsection