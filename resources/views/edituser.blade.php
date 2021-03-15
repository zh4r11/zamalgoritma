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
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('updateuser',$users->id) }}" method="POST" role="form">
            @csrf
            @method('patch')
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label @error('name') class="text-danger" @enderror>Name @error('name') | {{ $message }} @enderror</label>
                              <input type="text" class="form-control" id="name" name="name"
                              @if (old('name'))
                                value="{{ old('name') }}"
                              @else
                                value="{{ $users->name }}"
                              @endif
                               placeholder="Enter Full Name">
                            </div>
                        </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label @error('email') class="text-danger" @enderror>Email @error('email') | {{ $message }} @enderror</label>
                            <input type="email" class="form-control" id="email" name="email" 
                            @if (old('email'))
                              value="{{ old('email') }}"
                            @else
                              value="{{ $users->email }}"
                            @endif 
                            placeholder="Enter Email">  
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('role') class="text-danger" @enderror>Role @error('name') | {{ $message }} @enderror</label>
                            <input type="text" class="form-control" id="role" name="role"
                            @if (old('role'))
                              value="{{ old('role') }}"
                            @else
                              value="{{ $users->role }}"
                            @endif
                             placeholder="Enter Role">
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