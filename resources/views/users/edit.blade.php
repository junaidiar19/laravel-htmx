<form action="{{ route('users.update', $item) }}" method="POST">
    @csrf
    @method('PUT')
    @include('users._form')
    <div class="d-grid">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
