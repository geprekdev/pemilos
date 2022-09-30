<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pilih Kandidat</title>
  @vite('resources/css/app.css')
  <style>
    .vote-input:checked+.vote-card {
      box-shadow: 0 0 1px 5px #3063af;
    }

    body {
      background: linear-gradient(180deg,
          rgba(8, 56, 127, 1) 0%,
          rgba(11, 77, 175, 1) 100%) no-repeat;
    }
  </style>
</head>

<body>
  @if (in_array(auth()->user()->role_id, [App\Models\User::ADMIN, App\Models\User::SUPER_ADMIN]))
    <div class="px-8 py-4 flex flex-col sm:flex-row gap-4 sm:gap-0 justify-between items-center bg-gray-700 text-white">
      <div class="flex flex-col text-center sm:text-left">
        <span>Anda adalah <strong>ADMIN</strong></span>
        <span>Anda tidak bisa melakukan vote</span>
      </div>
      <a href="{{ route('admin.dashboard') }}" class="bg-blue-700 px-4 py-2 rounded-lg">Go to Dashboard &nbsp; &rarr;</a>
    </div>
  @endif
  <section class="p-14 text-white">
    <div class="flex-auto w-full">
      <h1 class="text-4xl font-bold w-full my-7 sm:w-96">
        Silahkan pilih kandidat jagoan anda!
      </h1>
      <span class="w-96">Ingat kamu hanya dapat memilih satu kali! </span>
    </div>
  </section>
  <img class="h-4 w-full sm:h-24" src="/img/grafis_1.png" alt="" />
  <form class="max-w-full flex flex-col justify-center mx-auto bg-[#f0f5ff]" action="{{ route('submit') }}"
    method="POST">
    @error('general')
      <div class="relative mx-10 my-5 px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
        <span class="absolute inset-y-0 left-0 flex items-center ml-4">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
            <path
              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
              clip-rule="evenodd" fill-rule="evenodd"></path>
          </svg>
        </span>
        <p class="ml-6">{{ $message }}</p>
      </div>
    @enderror
    @csrf
    @method('POST')
    @foreach ($labels as $label => $candidates)
      <h1 class="font-bold text-4xl my-10 text-center text-[#3063af]">
        Kandidat {{ $label }}
      </h1>
      @if ($errors->has('osis') || $errors->has('mpk'))
        <div class="relative mx-10 my-5 px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
          <span class="absolute inset-y-0 left-0 flex items-center ml-4">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
              <path
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
          </span>
          <p class="ml-6">{{ $errors->first('osis') ?? $errors->first('mpk') }}</p>
        </div>
      @endif
      <div class="flex flex-wrap flex-col gap-8 mx-6 mb-10 sm:flex-row sm:mx-auto">
        @foreach ($candidates as $candidate)
          <div class="flex-auto">
            <label>
              <input type="radio" name="{{ strtolower($candidate->label) }}" class="vote-input hidden"
                value="{{ $candidate->id }}" />
              <div
                class="vote-card flex flex-col items-center max-w-sm overflow-hidden rounded-xl bg-white shadow-xl duration-200 hover:scale-105 hover:shadow-xl hover:cursor-pointer">
                <div class="w-[300px] h-[300px] mx-6 mt-10">
                  <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                    class="w-full h-full object-cover mx-auto" />
                </div>
                <div class="p-5 text-center">
                  <p class="text-lg font-bold">{{ $candidate->name }}</p>
                </div>
              </div>
            </label>
          </div>
        @endforeach
      </div>
    @endforeach

    <!-- Button -->
    <button type="submit" onclick="return window.confirm('Apakah Anda yakin dengan pilihan ini?')"
      class="flex rounded-3xl px-8 py-4 my-10 w-[90%] mx-auto sm:w-[20%] bg-blue-800 hover:bg-blue-600 dark:text-white">
      <div class="flex items-center justify-between flex-1">
        <span class="text-lg font-medium text-white">Kirim</span>
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fillRule="evenodd" clipRule="evenodd"
            d="M0 8.71423C0 8.47852 0.094421 8.25246 0.262491 8.08578C0.430562 7.91911 0.658514 7.82547 0.896201 7.82547H13.9388L8.29808 2.23337C8.12979 2.06648 8.03525 1.84013 8.03525 1.60412C8.03525 1.36811 8.12979 1.14176 8.29808 0.974875C8.46636 0.807989 8.6946 0.714233 8.93259 0.714233C9.17057 0.714233 9.39882 0.807989 9.5671 0.974875L16.7367 8.08499C16.8202 8.16755 16.8864 8.26562 16.9316 8.3736C16.9767 8.48158 17 8.59733 17 8.71423C17 8.83114 16.9767 8.94689 16.9316 9.05487C16.8864 9.16284 16.8202 9.26092 16.7367 9.34348L9.5671 16.4536C9.39882 16.6205 9.17057 16.7142 8.93259 16.7142C8.6946 16.7142 8.46636 16.6205 8.29808 16.4536C8.12979 16.2867 8.03525 16.0604 8.03525 15.8243C8.03525 15.5883 8.12979 15.362 8.29808 15.1951L13.9388 9.603H0.896201C0.658514 9.603 0.430562 9.50936 0.262491 9.34268C0.094421 9.17601 0 8.94995 0 8.71423Z"
            fill="white" />
        </svg>
      </div>
    </button>

    <!-- Button -->
  </form>
</body>

</html>
