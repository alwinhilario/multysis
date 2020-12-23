@extends('welcome')

@section('mySection')
<div class="container-fluid">
    <div class="navigation nav justify-content-between text-white p-3 mb-3">
        <div class="d-flex align-items-center">
            <a class="text-white h3" href="{{ route('home.index') }}">
                Home Page
            </a>
            <a class="btn btn-success ml-3" href="{{ route('home.logout') }}">
                Log Out
            </a>
        </div>
        <div>
            <a class="text-white nav-link" href="{{ route('products.index') }}">Order Products</a>
        </div>
    </div>

    @yield('homeSection')
</div>
@endsection