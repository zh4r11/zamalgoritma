@extends('layouts.master')
@section('title', 'Product')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
      </h1>
    </section>

    <!-- Main content -->
    <div class="row">
        <!-- left column -->
        <div class="col-12 col-md-12 col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('updateproduct',$products->id) }}" method="POST" role="form">
            @csrf
            @method('patch')
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label @error('code') class="text-danger" @enderror>Product Code @error('code') | {{ $message }} @enderror</label>
                              <input type="text" class="form-control" id="code" name="code"
                              @if (old('code'))
                                value="{{ old('code') }}"
                              @else
                                value="{{ $products->code }}"
                              @endif
                               placeholder="Enter Product Code">
                            </div>
                        </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label @error('product') class="text-danger" @enderror>Product Name @error('product') | {{ $message }} @enderror</label>
                            <input type="text" class="form-control" id="product" name="product" 
                            @if (old('product'))
                              value="{{ old('product') }}"
                            @else
                              value="{{ $products->product }}"
                            @endif 
                            placeholder="Enter Product Name">  
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('stock') class="text-danger" @enderror>Stock @error('stock') | {{ $message }} @enderror</label>
                            <input type="text" class="form-control" id="stock" name="stock"
                            @if (old('stock'))
                              value="{{ old('stock') }}"
                            @else
                              value="{{ $products->stock }}"
                            @endif
                             placeholder="Enter Stock">
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