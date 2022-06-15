@extends('layouts.app', ['title' => __('User Profile')])
@section('DataUserNav')active @endsection
@section('Profile')active @endsection
@section('DataUser')show @endsection

@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile User</h6>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                    enctype="multipart/form-data" files="true">
                    @csrf
                    @method('put')

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <div class="form-group">
                        <label for="label">Name</label>
                        <input type="text" name="name" class="form-control" id="label"
                            value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="label">Email</label>
                        <input type="text" name="email" class="form-control" id="label"
                            value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="label">Password</label>
                        <input type="password" name="password" class="form-control" id="input-password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="label">Konfirmasi Password</label>
                        <input class="form-control" name="password_confirmation" id="input-password-confirmation"
                            type="password" placeholder="Confirm Password" />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
