@extends('admin.layouts.main')

@section('title')
  <title>List Pengguna</title>
@endsection

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Pemilih
  </h2>

  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Username</th>
            <th class="px-4 py-3">Role</th>
            <th class="px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($users as $user)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">{{ $user->name }}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      {{ $user->class ?? '' }}
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $user->username }}
              </td>
              <td class="px-4 py-3 text-xs">
                @switch($user->role_id)
                  @case(App\Models\User::SUPER_ADMIN)
                    @php
                      $badgeClasses = 'text-gray-700 bg-gray-100 dark:text-gray-100 dark:bg-gray-700';
                      $role = 'Super Admin';
                    @endphp
                  @break

                  @case(App\Models\User::ADMIN)
                    @php
                      $badgeClasses = 'text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700';
                      $role = 'Administrator';
                    @endphp
                  @break

                  @case(App\Models\User::STUDENT)
                    @php
                      $badgeClasses = 'text-blue-700 bg-blue-100 dark:text-blue-100 dark:bg-blue-700';
                      $role = 'Murid';
                    @endphp
                  @break

                  @case(App\Models\User::TEACHER)
                    @php
                      $badgeClasses = 'text-emerald-700 bg-emerald-100 dark:text-emerald-100 dark:bg-emerald-700';
                      $role = 'Guru';
                    @endphp
                  @break

                  @case(App\Models\User::STAFF)
                    @php
                      $badgeClasses = 'text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-600';
                      $role = 'Staff';
                    @endphp
                  @break
                @endswitch
                <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $badgeClasses }}">
                  {{ $role }}
                </span>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                      </path>
                    </svg>
                  </button>
                  <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Delete">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div
      class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      {{ $users->links('admin.layouts.paginator') }}
    </div>
  </div>
@endsection
