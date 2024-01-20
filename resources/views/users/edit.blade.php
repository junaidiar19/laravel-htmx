<div class="modal-header">
    <h1 class="modal-title fs-5" id="modal">Edit Pengguna</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('users.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        @include('users._form')
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
