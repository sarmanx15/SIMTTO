@extends('layouts.app', ['title' => __('Users')])
@section('DataUserNav')
    active
@endsection
@section('ManageUser')
    active
@endsection
@section('DataUser')
    show
@endsection
@section('content')
    <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
    <p class="mb-4">Berikut ini adalah data yang tersimpan di sistem</p>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah User
        </button>
    </div>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->username }}</td>
                                <td class="text-success">{!! $item->admin == 1 ? 'Administrator' : 'Petugas  ' !!} </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    @if ($item->id != auth()->id())
                                        <form method="POST" action="{{ route('user.destroy', [$item->id]) }}"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this data permanently?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('user.update', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="kamar_id">Kamar</label>
                                                    <select name="kamar_id" id="kamar_id"
                                                        class="form-control @error('kamar_id') is-invalid @enderror"
                                                        required>
                                                        <option value="" disabled selected>Choose one</option>
                                                        @foreach ($kamar as $kmr)
                                                            <option {{ $kmr->id == $item->kamar_id ? 'selected' : '' }}
                                                                value="{{ $kmr->id }}">{{ $kmr->label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('kamar_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="label"
                                                        value="{{ $item->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="label">Email</label>
                                                    <input type="text" name="email" class="form-control" id="label"
                                                        value="{{ $item->email }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="label">Username</label>
                                                    <input type="text" name="username" class="form-control" id="label"
                                                        value="{{ $item->username }}" required>
                                                </div>
                                                  
                                                <div class="form-group">
                                                    <label for="label">Password</label>
                                                    <input type="password" name="password" placeholder="Kosongkan Jika Tidak Ada Perubahan" class="form-control"
                                                        id="input-password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="label">Konfirmasi Password</label>
                                                    <input class="form-control" name="password_confirmation"
                                                        id="input-password-confirmation" type="password"
                                                        placeholder="Kosongkan Jika Tidak Ada Perubahan" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="label">Roles</label>
                                                    <select name="admin" id="admin"
                                                        class="form-control @error('admin') is-invalid @enderror" required>
                                                        <option value="" disabled selected>Choose one</option>
                                                        <option {{ $item->admin == 1 ? 'selected' : '' }} value="1">
                                                            Administrator</option>
                                                        <option {{ $item->admin == 0 ? 'selected' : '' }} value="0">
                                                            Petugas</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kamar_id">Kamar</label>
                            <select name="kamar_id" id="kamar_id"
                                class="form-control @error('kamar_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Choose one</option>
                                @foreach ($kamar as $kamar_id)
                                    <option value="{{ $kamar_id->id }}">{{ $kamar_id->label }}</option>
                                @endforeach
                            </select>
                            @error('kamar_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="label">Name</label>
                            <input type="text" name="name" class="form-control" id="label" required>
                        </div>
                        <div class="form-group">
                            <label for="label">Email</label>
                            <input type="text" name="email" class="form-control" id="label" required>
                        </div>
                        <div class="form-group">
                            <label for="label">Username</label>
                            <input type="text" name="username" class="form-control" id="label" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="label">Password</label>
                            <input type="password" name="password" id="input-password" class="form-control" id="input-password">
                        </div>
                        <div class="form-group">
                            <label for="label">Konfirmasi Password</label>
                            <input class="form-control" name="password_confirmation" id="input-password-confirmation"
                                type="password" placeholder="Confirm Password" />
                        </div> --}}
                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label">Roles</label>
                            <select name="admin" id="admin" class="form-control @error('admin') is-invalid @enderror"
                                required>
                                <option value="" disabled selected>Choose one</option>
                                <option value="0">Petugas</option>
                                <option value="1">Administrator</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('#dataTable').DataTable({

            });
        });
    </script>
@endsection
