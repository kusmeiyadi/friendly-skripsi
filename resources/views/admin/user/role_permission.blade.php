@extends('admin.layouts.app')

@section('title', 'User')

@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Role Permission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('roles.index') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h4 class="card-title">Add New Permission</h4>
                </div>
                <form action="{{ route('users.add_permission') }}" method="post">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        Add New
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Set Permission to Role</h3>
                </div>
                @if (session('success'))
                @alert(['type' => 'success'])
                {{ session('success') }}
                @endalert
                @endif
                <div class="card-body">
                    <form action="{{ route('users.roles_permission') }}" method="GET">
                        <div class="form-group">
                            <label for="">Roles</label>
                            <div class="input-group">
                                <select name="role" class="form-control">
                                    @foreach ($roles as $value)
                                    <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-danger">Check!</button>
                                </span>
                            </div>
                        </div>
                    </form>

                    {{-- jika $permission tidak bernilai kosong --}}
                    @if (!empty($permissions))
                    <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab_1" data-toggle="pill" role="tab" aria-controls="tab_1" aria-selected="true">Permissions</a>
                                    </li>
                                </ul>
                                <div class="card-body bg-light mb-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab_1">
                                        @php $no = 1;
                                        @endphp
                                        @foreach ($permissions as $key => $row)
                                        <input type="checkbox" name="permission[]" class="minimal-red" value="{{ $row }}" {{--  CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA CHECKED --}} {{ in_array($row, $hasPermission) ? 'checked':'' }}>
                                        {{ $row }}
                                        <br>
                                        @if ($no++%4 == 0)
                                        <br>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                              </div>
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-send"></i> Set Permission
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
