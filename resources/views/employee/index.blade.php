@extends('admin_template')


@section('content')

<section class="content-header">
    <h1>Employee List</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
        <li><a href="#">Maintenance</a></li>
        <li class="active">Employee List</li>
    </ol>
    @include('shared.notifications')
</section>



<section class="content">
	<div class="row">
		<div class="col-xs-12">
			{!! link_to_route('employee.create','New Employee',array(),['class' => 'btn btn-primary']) !!}
		</div>
	</div>
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Responsive Hover Table</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Employee ID</th>
                      <th>Card No.</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($employees as $employee)
                    <tr>
                      <td>{{ $employee->id }}</td>
                      <td>{{ $employee->first_name }}</td>
                      <td>{{ $employee->middle_name }}</td>
                      <td>{{ $employee->last_name }}</td>
                      <td>{{ $employee->emp_id }}</td>
                      <td>{{ $employee->card_no }}</td>
                      <td class="action">
                        {!! link_to_route('employee.edit','Edit',$employee->id,['class' => 'btn btn-xs btn-info']) !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
</section>



@endsection