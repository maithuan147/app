@extends('layouts.app')
@section('content')
<div class="show--height-center">
        <div class="form-content">
            <h3>Login to system</h3>
            <form method="POST" action="{{ route('login') }}" class="pxy-30 bg--color-white">
                @csrf
                <div class="form-group">
                    @include('components.input.email',[
                        'class' => 'form-control bg--color-brown',
                        'label' => __('Email'),
                        'name' => 'email',
                        'required' => true,
                        'default' => '',
                        'placeholder' => 'Jeson@gmail.com',
                        ])
                </div>
                <div class="form-group">
                    @include('components.input.password',[
                        'class' => 'form-control bg--color-brown',
                        'label' => __('Password'),
                        'name' => 'password',
                        'required' => true,
                        'default' => '',
                        'placeholder' => 'Jeson123',
                        ])
                </div>
                <div class="form-check" style="padding-left:0px !important">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleCheck1"> {{ __('Remember me') }}?</label>
                    <a href="{{ route('password.request') }}" class="text-color-blue">Forgot your password?</a>
                </div>
                  <button type="submit" class="btn btn-primary mt-20">Submit</button>
            </form>
            <p class="text-footer text-center">Copyright 2019 © Botble Technologies. Version: 3.4</p>
        </div>
    </div>
@endsection
