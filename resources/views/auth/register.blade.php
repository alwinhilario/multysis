@extends('welcome')

@section('mySection')

<div class="container-fluid mt-5" style="width: 500px">
    <form action="{{ route('register.store') }}" method="POST" autocomplte="off" novalidate>
        @csrf

        <div class="card">
            <div class="card-header">
                <span class="h3">
                    Registration Form
                </span>
            </div>
            <div class="card-body">
                @include('helpers.alerts.my_alert')

                <div class="row">
                    @include('forms.text', [
                    'label' => 'Full Name',
                    'id' => 'name',
                    'body' => '12'
                    ])
                </div>

                <div class="row">
                    @include('forms.text', [
                    'label' => 'Email Address',
                    'id' => 'email',
                    'body' => '12'
                    ])
                </div>

                <div class="row">
                    @include('forms.password', [
                    'label' => 'Password',
                    'id' => 'password',
                    'body' => '12'
                    ])
                </div>

                <div class="row">
                    @include('forms.password_confirm', [
                    'label' => 'Re-write Password',
                    'id' => 'password',
                    'body' => '12'
                    ])
                </div>

            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('login.index') }}">
                    &larr; I already have an Account
                </a>
                <button class="btn btn-primary font-weight-bold ml-4" type="submit">
                    Sign Up
                </button>

            </div>
        </div>
    </form>
</div>

@endsection