@extends('admin_template')


@section('content')

<section class="content-header">
    <h1>Employee Logs</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Report</a></li>
        <li class="active">Employee Logs</li>
    </ol>
    @include('shared.notifications')
</section>



<section class="content">
  <div class="row">
            <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>FullName</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Terminal</th>
                        </tr>
                    </thead>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
</section>



@endsection
@section('page-script')
<script>
      $(function () {
        var table = $('#example2').DataTable({
          "aaSorting": [],
          processing: true,
          serverSide: true,
          ajax: 'anydata',
          columns: [
              { data: 'fullname', name: 'fullname' },
              { data: 'timein', name: 'timein' },
              { data: 'timeout', name: 'timeout' },
              { data: 'terminal', name: 'terminal' },
          ]
      });
       
      setInterval( function () {
          table.ajax.reload();
      }, 5000 );

        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        //    ajax: "data.json"
        // });
      });
    </script>


@stop