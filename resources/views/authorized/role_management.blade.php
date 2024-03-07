@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Quản Lý Phân Quyền</h1>
    <form action="{{ route('saveRolesPermissions') }}" method="POST">
        @csrf
        @foreach ($roles as $role)
            <div class="role">
                <h3>{{ $role->name }}</h3>
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}_permission_{{ $permission->id }}"
                               name="permissions[{{ $role->id }}][]" value="{{ $permission->id }}"
                               {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="role_{{ $role->id }}_permission_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
