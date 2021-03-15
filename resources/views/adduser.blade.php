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
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('saveuser') }}" method="POST" role="form">
            @csrf
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label @error('name') class="text-danger" @enderror>Name @error('name') | {{ $message }} @enderror</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Full Name">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label @error('email') class="text-danger" @enderror>Email @error('email') | {{ $message }} @enderror</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">  
                          </div>
                      </div> 
                  </div> 

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label @error('name') class="text-danger" @enderror>Password @error('password') | {{ $message }} @enderror</label>
                          <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter Password">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label @error('email') class="text-danger" @enderror>Retype Password @error('password1') | {{ $message }} @enderror</label>
                          <input type="password" class="form-control" id="password1" name="password1" value="" placeholder="Retype Password">  
                        </div>
                    </div> 
                </div> 

                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label @error('role') class="text-danger" @enderror>Role @error('role') | {{ $message }} @enderror</label>
                        <input type="text" class="form-control" id="role" name="role" value="" placeholder="Enter Role">
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