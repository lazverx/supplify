<!-- resources/views/admin/users/show.blade.php -->

<h1>Detail User</h1>

<p><strong>Nama:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

<a href="{{ route('admin.users.index') }}">← Kembali ke daftar user</a>
