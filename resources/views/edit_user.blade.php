@extends('layouts.app')

@section('content')

<div class = "container">
    <h1>Edit User</h1>

    <form action = " {{ route('user.update', $user->id) }}" method = "POST">
        @csrf
        @method('PUT')

        <label for = "nama">Nama:</label>
        <input type = "text" id = "nama" name = "nama" value = " {{ $user->nama }} " required><br><br>

        <label for = "npm">NPM:</label>
        <input type = "number" id = "npm" name = "npm" value = " {{ $user->npm }}" required><br><br>

        <label for="kelas_id">Kelas:</label>
        <select id="kelas_id" name="kelas_id" required>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type = "submit">Update</button>
    </form>
</div>
@endsection