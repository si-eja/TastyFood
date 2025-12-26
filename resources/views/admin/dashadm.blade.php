@extends('admin.tempdash')
@section('content')
<section class="container-fluid bg-light" style="height: 100vh;">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-7">
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="rounded bg-light shadow p-3"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="rounded bg-light shadow p-3"></div>
                    </div>
                </div>
                <div class="my-2">
                    <div class="rounded bg-light shadow p-3" style="height: 200px;"></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="rounded bg-light shadow p-3" style="height: 100%;"></div>
            </div>
        </div>
        <div class="mt-2">
            <div class="rounded p-3 bg-light shadow"></div>
        </div>
        <div class="mt-2">
            <div class="rounded p-3 bg-light shadow"></div>
        </div>
    </div>
</section>
@endsection