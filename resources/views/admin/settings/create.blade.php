@extends('admin.layouts.main')

@section('title')
  <title>Tambah Settings</title>
@endsection

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Tambah Settings
  </h2>

  <form action="{{ route('admin.settings.store') }}" method="POST"
    class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label for="attribute" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Attribute</label>
    <input
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
      name="attribute" type="text" id="attribute" value="{{ old('attribute') }}">
    @error('attribute')
      <span class="text-xs text-red-600 dark:text-red-400">
        {{ $message }}
      </span>
    @enderror

    <label for="value" class="block mb-2 mt-4 text-sm font-medium text-gray-700 dark:text-gray-400">Value</label>
    <input
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
      name="value" type="text" id="value" value="{{ old('value') }}">
    @error('value')
      <span class="text-xs text-red-600 dark:text-red-400">
        {{ $message }}
      </span>
    @enderror

    <button type="submit" onclick="return window.confirm('Yakin ingin menambah setting ini?')"
      class="mt-6 mr-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>

    <a href="{{ route('admin.settings.index') }}"
      class="mt-6 text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Kembali</a>
  </form>
@endsection
