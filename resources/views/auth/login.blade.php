@extends('auth.layouts.app')

@section('content')

    <center>
      <div id="loginWrapper">
         <div id="loginBox">    
            <div id="loginBox-head">
            <div id="loginBoxhead_img"><img src="{{ URL::asset('auth/images/logo.png') }}" alt="" width="45" height="45" /></div>
                <h1>Sistem Rekam Medis</h1>
            </div>

            <div id="loginBox-title">
               <h2>Rekam Medis</h2>
               <img src="{{ URL::asset('auth/images/loginBox-title-img-mid-redis.jpeg') }}" alt="">
            </div> 
             <div id="loginBox-body">

               <form id="form-login" name="form-login"  action="{{ url('/login') }}" method="post" autocomplete="off">
               {!! csrf_field() !!}
               
                  <label for="aid_username">Username</label>
                  <input type="text" id="username" name="username" value="{{ old('username') }}" onBlur="clearPasswordField();" />
                  
                  @if ($errors->has('username'))
                      <br><span class="help-block">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif

                  <br />
                  <label for="aid_password">Password</label>
                  <input type="password" id="password" name="password" value="" />
                  @if ($errors->has('password'))
                      <br><span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif 
                  <br />
                  <label> </label>
                    <input class="button" type="submit" value="Login" />

               </form>
            </div>
            <div id="loginBox-foot"></div>
         </div>
        </div>  
   </center>    
@endsection
