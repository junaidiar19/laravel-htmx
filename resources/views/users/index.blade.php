@forelse ($users as $user)
    <tr
        @if ($loop->last && @$users->nextPageUrl()) hx-get="{{ $users->nextPageUrl() }}"
        hx-trigger="revealed"
        hx-swap="beforeend" @endif>
        <td>{{ $users->firstItem() + $loop->index }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <form action="{{ route('users.destroy', $user) }}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus user: {{ $user->email }}?')">Hapus</button>
            </form>
            <button class="btn btn-success btn-sm" hx-get="{{ route('users.edit', $user) }}" hx-target=".modal-content"
                hx-trigger="click" data-bs-toggle="modal" data-bs-target=".open-modal">
                Edit
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center">Tidak ada data</td>
    </tr>
@endforelse
