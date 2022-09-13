@extends('admin.layouts.main')

@section('title')
  <title>Edit User</title>
@endsection

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Edit User
  </h2>

  <form x-data="{ isStudentRadio: {{ isset($user->class) ? 'true' : 'false' }} }" action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST"
    class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf
    @method('PUT')

    <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
    <input
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
      name="name" type="text" id="name" value="{{ $user->name }}">
    @error('name')
      <span class="text-xs text-red-600 dark:text-red-400">
        {{ $message }}
      </span>
    @enderror

    <label for="username" class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-gray-400">Username</label>
    <input
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
      name="username" type="text" id="username" value="{{ $user->username }}">
    @error('username')
      <span class="text-xs text-red-600 dark:text-red-400">
        {{ $message }}
      </span>
    @enderror

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Role
      </span>
      <div class="mt-2">
        @foreach ($roles as $id => $role)
          <label class="inline-flex items-center mx-3 text-gray-600 dark:text-gray-400">
            <input @click="isStudentRadio = {{ $role === 'Murid' ? 'true' : 'false' }}" type="radio" name="role_id"
              value="{{ $id }}" {{ $user->role_id === $id ? 'checked' : '' }} />
            <span class="ml-2">{{ $role }}</span>
          </label>
        @endforeach
      </div>
      @error('role_id')
        <span class="text-xs text-red-600 dark:text-red-400">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div>
      <label x-show.transition="isStudentRadio" for="class"
        class="block mt-4 mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Kelas</label>
      <input x-show.transition="isStudentRadio"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
        name="class" type="text" id="class" value="{{ $user->class }}">
      @error('class')
        <span x-show.transition="isStudentRadio" class="text-xs text-red-600 dark:text-red-400">
          {{ $message }}
        </span>
      @enderror
    </div>

    <button type="submit" onclick="return window.confirm('Yakin ingin mengubah data user ini?')"
      class="mt-6 mr-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>

    <a href="{{ route('admin.users.index') }}"
      class="mt-6 text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Kembali</a>
  </form>
@endsection
