@extends('admin_template')


@section('content')

<section class="content-header">
    <h1>Terminal List</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
        <li><a href="#">Maintenance</a></li>
        <li class="active">Terminal List</li>
    </ol>
    @include('shared.notifications')
</section>



<section class="content">
	<div class="row menu">
		<div class="col-xs-12">
			{!! link_to_route('terminal.create','New Terminal',array(),['class' => 'btn btn-primary']) !!}
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
                      <th>Description</th>
                      <th>Token</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($terminals as $terminal)
                    <tr>
                      <td>{{ $terminal->id }}</td>
                      <td>{{ $terminal->terminal }}</td>
                      <td>{{ $terminal->token }}</td>
                      <td>{{ (($terminal->active == 1) ? 'Active':'Inactive') }}</td>
                      <td class="action">
                        {!! link_to_route('terminal.edit','Edit',$terminal->id,['class' => 'btn btn-xs btn-info']) !!}
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