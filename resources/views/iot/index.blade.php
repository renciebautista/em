@extends('admin_template')


@section('content')

<section class="content-header">
    <h1>IOT Dashboard</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Report</a></li>
        <li class="active">IOT Dashbaord</li>
    </ol>
    @include('shared.notifications')
</section>



<!-- Main content -->
        <section class="content">
          <div class="row">
           
            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">As of 24 Hours</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="line-chart" style="height: 300px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
          </div><!-- /.row -->

        </section><!-- /.content -->



@endsection

@section('page-script')
<!-- page script -->
    <script>
      $(function () {
        "use strict";



        // LINE CHART
        var line = new Morris.Line({
          element: 'line-chart',
          resize: true,
          data: [],
          xkey: 'date',
          ykeys: ['value'],
          labels: ['Temp'],
          xLabels: ['hour'],
          //dateFormat: function (x) { return new Date(x).toDateString(); },
          lineColors: ['#3c8dbc'],
          hideHover: 'auto'
        });

        // Fire off an AJAX request to load the data
        

         
        setInterval( function () {
            $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/api/iotlog/1", // This is the URL to the API
            data: { days: 7 } // Passing a parameter to the API to specify number of days
          })
          .done(function( data ) {
            // When the response to the AJAX request comes back render the chart with new data
            line.setData(data);
          })
          .fail(function() {
            // If there is no communication between the server, show an error
            alert( "error occured" );
          });
        }, 5000 );
        
      });
    </script>
@stop