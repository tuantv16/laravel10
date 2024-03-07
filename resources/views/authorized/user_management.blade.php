@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quản Lý Người Dùng</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('user-management/save') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên Người Dùng:</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="role">Vai Trò:</label>
            <select class="form-control" id="role" name="role_id">
                <option value="">Chọn một vai trò</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
