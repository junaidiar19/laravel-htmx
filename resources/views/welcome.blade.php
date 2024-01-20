<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel HTMX</title>
    <link rel="shortcut icon" href="{{ asset('laravel.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 ps-0">
                    @foreach ($errors->all() as $error)
                        <li class="list-unstyled">&bullet; {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Data Pengguna
                    </div>
                    <div class="card-body">
                        <input class="form-control mb-3" type="search" name="search"
                            placeholder="Begin Typing To Search Users..." hx-get="{{ route('users.index') }}"
                            hx-trigger="input changed delay:500ms, search" hx-target="#show-users">
                        <div class="table-responsive">
                            <table class="table table-bordered" hx-get="{{ route('users.index') }}"
                                hx-trigger="load delay:1s" hx-target="#show-users">
                                <thead>
                                    <tr>
                                        <th width="10">#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show-users">
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div class="spinner-border" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Tambah Pengguna
                    </div>
                    <div class="card-body">
                        <form hx-post="{{ route('users.store') }}" hx-target="#show-users" hx-swap="innerHTML">
                            @csrf
                            @include('users._form')
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    {{-- <div class="modal fade open-modal" style="display: none" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal">Edit Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center py-5">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal modal-blur fade open-modal" style="display: none" aria-hidden="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- <script>
        const modal = document.querySelector('.open-modal');

        modal.addEventListener('shown.bs.modal', (e) => {
            var url = e.relatedTarget.getAttribute('data-url');
            var body = modal.querySelector('.modal-body');

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    body.innerHTML = data;
                })
                .catch(error => {
                    body.innerHTML = error;
                });
        });
    </script> --}}
</body>

</html>
