@extends('layouts.master')
@section('title', 'Product')   

@push('page-styles')

 <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

 @endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PRODUCT
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
        <a href="{{ route('addproduct') }}" class="btn btn-primary btn-lg">Add Product</a>
        </div>
    </div>
    <div class="box-body">
      @if(session('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{session('message')}}
        </div>
      @endif
        <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $no => $product)
                <tr>
                    <td>{{ $no+1}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('editproduct',$product->id) }}" class="badge badge-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#" data-id="{{ $product->id }}" class="badge badge-danger swal-confirm"><i class="fa fa-trash">
                        <form action="{{ route('deleteproduct',$product->id) }}" id="delete{{ $product->id }}" method="POST">
                          @csrf
                          @method('delete')
                        </form></i>
                        Delete
                      </a>
                    </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                  <th>No.</th>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
        <!-- /.box-body -->

      <!-- /.box -->
      
      <div class="modal modal-danger fade" id="modal-delete">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Delete Product</h4>
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

// $('.btn-del').on('click',function(){
//   console.log($(this).data('id'))
//   let id = $(this).data('id')
//   $.ajax({
//       url:'/product/delete/${id}',
//       method:"DELETE",
//       success: function(data){
//         console.log(data)
//         $('#modal-delete').modal('show')
//       },
//       error:function(error){
//         console.log(error)
//       }
//   })
// })

</script>
@endpush
