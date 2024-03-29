@extends('user/app')

@section('bg-img',asset('user/img/login-black.jpg'))
@section('head')

@endsection
@section('title','Register Here')
@section('sub-heading','')

@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
           <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
               {{ csrf_field() }}

               <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                   <label for="name" class="col-md-12 control-label">First Name</label>

                   <div class="col-12">
                       <input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                       @if ($errors->has('first_name'))
                           <span class="help-block">
                               <strong>{{ $errors->first('first_name') }}</strong>
                           </span>
                       @endif
                   </div>
               </div>

               <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                   <label for="name" class="col-md-12 control-label">Last Name</label>

                   <div class="col-12">
                       <input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                       @if ($errors->has('last_name'))
                           <span class="help-block">
                               <strong>{{ $errors->first('last_name') }}</strong>
                           </span>
                       @endif
                   </div>
               </div>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                   <label for="email" class="col-12 control-label">E-Mail Address</label>

                   <div class="col-12">
                       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                       @if ($errors->has('email'))
                           <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                           </span>
                       @endif
                   </div>
               </div>

               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                   <label for="password" class="col-12 control-label">Password</label>

                   <div class="col-12">
                       <input id="password" type="password" class="form-control" name="password" required>

                       @if ($errors->has('password'))
                           <span class="help-block">
                               <strong>{{ $errors->first('password') }}</strong>
                           </span>
                       @endif
                   </div>
               </div>

               <div class="form-group">
                   <label for="password-confirm" class="col-12 control-label">Confirm Password</label>

                   <div class="col-12">
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                   </div>
               </div>

               <div class="form-group">
                   <div class="col-6 col-md-offset-4">
                       <button type="submit" class="btn btn-primary">
                           Register
                       </button>
                   </div>
               </div>
           </form>
        </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection
