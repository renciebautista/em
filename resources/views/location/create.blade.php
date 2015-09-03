@extends('admin_template')

@section('content')
<section class="content-header">
    <h1>New Location</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
        <li><a href="#">Locations</a></li>
        <li class="active">New Location</li>
    </ol>
</section>

@include('shared.notifications')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                  	<h3 class="box-title">Location Details</h3>
                </div>
                {!! Form::open(array('route' => 'location.store')) !!}
                  	<div class="box-body">
	                    <div class="form-group">
	                    	{!! Form::label('location', 'Description'); !!}
	                    	{!! Form::text('location',null,['class' => 'form-control','placeholder' => 'Enter Description']) !!}
	                    </div>
                  	</div><!-- /.box-body -->

                  	<div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  		{!! link_to_route('location.index','Back',array(),['class' => 'btn btn-default']) !!}
                    	
                  	</div>
                {!! Form::close() !!}
            </div>
    </div>
 </section>
@endsection
