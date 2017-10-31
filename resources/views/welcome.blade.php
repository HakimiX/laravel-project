@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')

    @include('includes.message-block')

    <div class="row">
        <div class="col-md-6">
        <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ Request::old('email') }}">
                    @if ($errors->has('email'))
                        <span class="error" style="color:red">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <span class="error" style="color:red">{{$errors->first('first_name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{ Request::old('password') }}">
                    @if ($errors->has('password'))
                        <span class="error" style="color:red">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

         <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signin')}}" method="post">
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ Request::old('email') }}">
                    @if ($errors->has('email'))
                        <span class="error" style="color:red">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{ Request::old('password') }}">
                    @if ($errors->has('password'))
                        <span class="error" style="color:red">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection

