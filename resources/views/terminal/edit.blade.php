@extends('admin_template')

@section('content')
<section class="content-header">
    <h1>Edit Terminal</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
        <li><a href="#">Terminals</a></li>
        <li class="active">Edit Terminal</li>
    </ol>
</section>

@include('shared.notifications')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                  	<h3 class="box-title">Terminal Details</h3>
                </div>
                {!! Form::model($terminal,['method' => 'PATCH', 'route' => ['terminal.update', $terminal->id]]) !!}
                  	<div class="box-body">
	                    <div class="form-group">
	                    	{!! Form::label('terminal', 'Description'); !!}
	                    	{!! Form::text('terminal',null,['class' => 'form-control','placeholder' => 'Enter Description']) !!}
	                    </div>
	                    <div class="checkbox">
	                      	<label>
	                      		{!! Form::checkbox('active', '1') !!} Active
	                      	</label>
	                    </div>
                  	</div><!-- /.box-body -->

                  	<div class="box-footer">
                       {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                  		{!! link_to_route('terminal.index','Back',array(),['class' => 'btn btn-default']) !!}
                     
                  	</div>
                {!! Form::close() !!}
            </div>
    </div>
 </section>
@endsection