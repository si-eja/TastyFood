@extends('login.templog')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6 col-md-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4 fw-bold">Login</h3>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection