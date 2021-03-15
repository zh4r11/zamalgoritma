@extends('layouts.master')
@section('title', 'User')

@push('page-styles')

 <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />

 @endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USER
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
        <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-send">Send</a>
        </div>
    </div>
    <div class="box-body">
      @if(session('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{session('message')}}
        </div>
      @endif
        <table id="example" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($raw as $r => $raw)
                <tr id="{{ $raw->id }}">
                    <td></td>
                    <td>{{ $raw->name }}</td>
                    <td><a href="tel:{{ $raw->phone }}">{{ $raw->phone }}</a></td>
                    <td>{{ $raw->address }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </tfoot>
        </table>
    </div>
        <!-- /.box-body -->

      <!-- /.box -->
      
      <div class="modal modal-primary fade" id="modal-send">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Delete User</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure to delete this data?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                      <button type="button" class="btn btn-outline">Yes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
    </section>
    <!-- /.content -->
</div>


@endsection

@push('page-scripts')

<!-- Sweet Alert -->
<script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/page/modules-sweetalert.js')}}"></script>


<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

@endpush

@push('after-scripts')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(".swal-confirm").click(function(e) {
  id = e.target.dataset.id;
  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $(`#delete${id}`).submit();
      } else {
      }
    });
});

$(document).ready(function() {
  var table = $('#example').DataTable({
        'columnDefs': [{
            'targets': 0,
            'checkboxes': {
                'selectRow': true
            }
        }],
        'select': {
            'style': 'multi'
        },
        'fnCreatedRow': function(nRow, aData, iDataIndex) {
            $(nRow).attr('data-id', aData.DT_RowId); // or whatever you choose to set as the id
            $(nRow).attr('id', 'id_' + aData.DT_RowId); // or whatever you choose to set as the id
        },
        'order': [
            [1, 'asc']
        ]
    });
    // Handle form submission event 
    $('#frm-example').on('submit', function(e) {
        var form = this;


        var rows = $(table.rows({
            selected: true
        }).$('input[type="checkbox"]').map(function() {
            return $(this).prop("checked") ? $(this).closest('tr').attr('data-id') : null;
        }));
        //console.log(table.column(0).checkboxes.selected())
        // Iterate over all selected checkboxes
        rows_selected = [];
        $.each(rows, function(index, rowId) {
            console.log(rowId)
            // Create a hidden element 
            rows_selected.push(rowId);
            $(form).append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .console.log(rowId)
                //.val(rowId)
            );
        });

        // FOR DEMONSTRATION ONLY
        // The code below is not needed in production

        // Output form data to a console     
        $('#example-console-rows').text(rows_selected.join(","));

        // Output form data to a console     
        $('#example-console-form').text($(form).serialize());

        // Remove added elements
        $('input[name="id\[\]"]', form).remove();

        // Prevent actual form submission
        e.preventDefault();
    });
});

</script>
@endpush
