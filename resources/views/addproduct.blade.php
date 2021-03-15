@extends('layouts.master')
@section('title', 'User')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USER
      </h1>
    </section>

    <!-- Main content -->
    <div class="row">
        <!-- left column -->
        <div class="col-12 col-md-12 col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('saveproduct') }}" method="POST" role="form">
            @csrf
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label @error('code') class="text-danger" @enderror>Name @error('code') | {{ $message }} @enderror</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" placeholder="Enter Product Code">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label @error('product') class="text-danger" @enderror>Email @error('email') | {{ $message }} @enderror</label>
                            <input type="text" class="form-control" id="product" name="product" value="{{ old('product') }}" placeholder="Enter Product Name">  
                          </div>
                      </div> 
                  </div> 

                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label @error('stock') class="text-danger" @enderror>Role @error('stock') | {{ $message }} @enderror</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="" placeholder="Enter Stock">
                      </div>
                    </div>
              </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      </section>
    <!-- /.content -->
</div>
@endsection

@push('page-scripts')


@endpush