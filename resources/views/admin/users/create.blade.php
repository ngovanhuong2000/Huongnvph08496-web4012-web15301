@extends("layout")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('contents')
<form method="POST" class="mt-5" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="mt-3">
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{ old('name')}}">
        @error('name')
            <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class="mt-3 form-control" type="text" name="email" value="{{ old('email')}}">
        @error('email')
        <span class="text-danger">{{ $message}}</span>
    @enderror
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address" value="{{ old('address')}}">
        @error('address')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Password</label>
        <input class="mt-3 form-control" type="password" name="password">
        @error('password')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="mt-3">
        <label for="">Gender</label>
        <select name="gender">
            <option value="{{ config('common.user.gender.male')}}" 
            {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.male ') ? "selected" : "" }}
            >Male</option>
            <option value="{{ config('common.user.gender.female')}}" 
            {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.female ') ? "selected" : "" }}>
            Female</option>
        </select>
        @error('gender')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Role</label>
        <select name="role">
            <option value="{{ config('common.user.role.user')}}" 
            {{ old('role') == config('common.user.role.user')  ? "selected" : "" }}>User</option>
            
            <option value="{{ config('common.user.role.admin')}}" 
            {{ old('role') == config('common.user.role.admin') ? "selected" : "" }}>Admin</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


