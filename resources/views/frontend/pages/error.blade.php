@extends('frontend.layouts.app')

@section('content')

<main class="main">
    <div class="page-content">
        <section
            class="error-section d-flex flex-column justify-content-center align-items-center text-center pl-3 pr-3">
            <h1 class="mb-2 ls-m">Error 404</h1>
            <img src="{{ asset('asset-frontend/images/subpages/404.png') }}" alt="error 404" width="609" height="131">
            <h4 class="mt-7 mb-0 ls-m text-uppercase">Ooopps.! That page can’t be found.</h4>
            <p class="text-grey font-primary ls-m">It looks like nothing was found at this location.</p>
            <a href="{{ route('home') }}" class="btn btn-primary btn-rounded mb-4">Go home</a>
        </section>
    </div>
</main>

@endsection
