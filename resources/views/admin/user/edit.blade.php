@extends('admin.layouts.app')

@section('title', 'User')

@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('users.create') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Users</h3>
                </div>

                @if (session('error'))
                @alert(['type' => 'danger'])
                {!! session('error') !!}
                @endalert
                @endif

                <form action="{{ route('users.update', $user->id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required readonly>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            <p class="text-success">Biarkan kosong, jika tidak ingin mengganti password</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-send"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
