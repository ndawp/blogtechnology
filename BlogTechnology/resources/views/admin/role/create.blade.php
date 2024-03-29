@extends('admin.layouts.app')
@section('main-content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Roles</h3>
            </div>
            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
            @endforeach 
          @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('role.store') }}" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="col-lg-6">
                  <div class="form-group">
                  <label for="name">Role Title</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Role Title">
                </div>

                <div class="row">
                <div class="col-lg-4">
                  <label for="name">Posts Permissions</label>

                  @foreach ($permissions as $permission)
                    @if ($permission->for == 'post')
                      <div class="checkbox">
                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="col-lg-4">
                  <label for="name">User Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'user')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                        
                      @endif
                    @endforeach
                </div>

                <div class="col-lg-4">
                  <label for="name">Other Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'other')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                      @endif
                    @endforeach
                </div>
              </div>
                
                </div>
 
                </div>
                
              

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="button" href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
         
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection