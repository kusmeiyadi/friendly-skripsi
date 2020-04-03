@extends('admin.layouts.app')

@section('main-content')
  <div class="card-body">
<div class="form-group">
    <label for="">Nama</label>
    <input type="text" name="name" value="@if(isset($user->name)){{ $user->name }} @endif" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
    <p class="text-danger">{{ $errors->first('name') }}</p>
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" value="@if(isset($user->email)){{ $user->email }} @endif" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required readonly>
    <p class="text-danger">{{ $errors->first('email') }}</p>
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
    <p class="text-danger">{{ $errors->first('password') }}</p>
    <p class="text-success">Biarkan kosong, jika tidak ingin mengganti password</p>
</div>
<div class="form-group">
    <label for="">Role</label>
    <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
        <option value="">Pilih</option>
        @foreach ($role as $row)
        <option value="{{ $row->name }}">{{ $row->name }}</option>
        @endforeach
    </select>
    <p class="text-danger">{{ $errors->first('role') }}</p>
</div>
</div>
@endsection
