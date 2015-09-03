@extends('admin_template')

@section('content')
<section class="content-header">
    <h1>New Employee</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
        <li><a href="#">Employees</a></li>
        <li class="active">New Employee</li>
    </ol>
</section>

@include('shared.notifications')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                  	<h3 class="box-title">Employee Details</h3>
                </div>
                {!! Form::open(array('route' => 'employee.store')) !!}
                  	<div class="box-body">
	                    <div class="form-group">
	                    	{!! Form::label('first_name', 'First Name'); !!}
	                    	{!! Form::text('first_name',null,['class' => 'form-control','placeholder' => 'Enter First Name']) !!}
	                    </div>

                      <div class="form-group">
                        {!! Form::label('middle_name', 'Middle Name'); !!}
                        {!! Form::text('middle_name',null,['class' => 'form-control','placeholder' => 'Enter Middle Name']) !!}
                      </div>

                      <div class="form-group">
                        {!! Form::label('last_name', 'Last Neme'); !!}
                        {!! Form::text('last_name',null,['class' => 'form-control','placeholder' => 'Enter Last Name']) !!}
                      </div>

                      <div class="form-group">
                        {!! Form::label('emp_id', 'Employee ID'); !!}
                        {!! Form::text('emp_id',null,['class' => 'form-control','placeholder' => 'Enter Employee ID']) !!}
                      </div>

                      <div class="form-group">
                        {!! Form::label('cord_no', 'Card No.'); !!}
                        {!! Form::text('card_no',null,['class' => 'form-control','placeholder' => 'Enter Card No.']) !!}
                      </div>
                  	</div><!-- /.box-body -->

                  	<div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  		{!! link_to_route('employee.index','Back',array(),['class' => 'btn btn-default']) !!}
                    	
                  	</div>
                {!! Form::close() !!}
            </div>
    </div>
 </section>
@endsection
