<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Voting SMK Negeri 8 Semarang</title>
  @vite('resources/css/app.css')
</head>

<body>
  @if (in_array(auth()->user()->role_id, [App\Models\User::ADMIN, App\Models\User::SUPER_ADMIN]))
    <div class="px-8 py-4 flex flex-col sm:flex-row gap-4 sm:gap-0 justify-between items-center bg-gray-700 text-white">
      <span>Anda adalah <strong>ADMIN</strong></span>
      <a href="{{ route('admin.dashboard') }}" class="bg-blue-700 px-4 py-2 rounded-lg">Go to Dashboard &nbsp; &rarr;</a>
    </div>
  @endif
  <!-- Section 1# -->
  <main class="justify-center">
    <div class="w-full mx-auto">
      <img class="block h-72 sm:hidden" src="/img/Grafis_1_S.svg" alt="" />

      <div class="flex flex-wrap">
        <div class="flex-auto w-2/6 p-12">
          <img class="max-w-[300px]" src="/img/logo.png" alt="" srcset="" />

          <div class="w-full mt-14 py-10">
            <h1 class="text-[38px] leading-10 font-extrabold">
              Demokrasi Milenial IDOLA!
            </h1>
            <p class="mt-4">
              Ayo berkontribusi di pesta demokrasi ini. Pilihanmu menentukan
              masa depan SMK Negeri 8 Semarang!
            </p>
            <button onclick="location.href='#introduction';"
              class="block uppercase rounded-[28px] shadow bg-blue-800 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white text-base font-bold mt-14 py-4 px-12">
              Ayo Mulai!
            </button>
          </div>
        </div>
        <div class="hidden md:flex flex-auto w-8/12">
          <img class="ml-auto h-[85%]" src="/img/hero.svg" alt="" />
        </div>
      </div>
    </div>
  </main>
  <!-- End Section 1# -->

  <section id="introduction" class="w-full max-w-5xl mx-auto">
    <div class="flex flew-wrap flex-col sm:flex-row">
      <div class="flex-auto w-full p-7 sm:w-3/4">
        <img src="/img/calon.png" alt="" />
      </div>

      <div class="flex-auto self-center p-4 sm:p-0">
        <h4 class="text-[30px] font-extrabold">Ayo kenalan dulu!</h4>
        <div class="flex self-center gap-5">
          <span class="h-12 bg-blue-700 p-[1.5px] rounded-3xl self-center"></span>
          <p>
            Untuk memilih calon ketua OSIS dan paslon wakil & ketua MPK, kamu
            bisa terus gulir halaman ini kebawah
          </p>
        </div>
      </div>
    </div>
  </section>

  <img class="h-24 w-full mt-24" src="/img/grafis_1.png" alt="" />
  <section class="w-full bg-[#f0f5ff] mb-0">
    <div class="max-w-5xl mx-auto w-full p-4 sm:w-[1024px]">
      <h1 class="text-3xl text-[#3063af] font-bold sm:text-4xl">
        Calon Ketua OSIS
      </h1>
    </div>

    <!-- CALON -->
    <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
      <div class="flex flex-wrap p-4 flex-col sm:flex-row gap-11">
        <div class="flex-auto w-52 sm:w-[5%]">
          <img src="/img/paslon1_mpk.png" class="max-w-full h-auto" alt="Calon" />
        </div>
        <div class="flex-auto text-slate-800 w-full sm:w-[45%]">
          <div class="mb-8">
            <span class="text-sm font-semibold text-[#3063af]">Caketos 1</span>
            <h2 class="text-3xl font-bold">Yohanes Dwiki Indarto</h2>
            <span class="text-sm">BERSAMA SAYA IDOLA BISA!</span>
          </div>

          <div class="flex flex-wrap flex-col sm:flex-row">
            <div class="flex-auto pr-7 text-sm w-full sm:w-1/3">
              <p class="font-semibold text-[#3063af] my-4">Visi</p>
              <span>Menjadikan OSIS sebagai sarana pengembangan potensi siswa
                agar memiliki karakter Inovatif, Disiplin, Kolaboratif serta
                beriman kepada Tuhan Yang Maha Esa dan Meningkatkan pandangan
                baik terhadap OSIS SMKN 8 Semarang agar menjadi sekolah yang
                unggul dalam prestasi.
              </span>
            </div>

            <div class="flex-auto pr-7 w-full text-sm sm:w-1/3">
              <p class="font-semibold text-[#3063af] my-4">Misi</p>
              <ul class="list-inside border-box">
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menjadikan OSIS sebagai wadah aspirasi bagi para siswa.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Mempererat kekeluargaan antara seluruh anggota sekolah.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menciptakan lingkungan sekolah yang kondusif.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Merangkul siswa supaya lebih aktif dalam kegiatan sekolah.
                </li>
              </ul>
            </div>

            <div class="flex-auto pr-7 text-sm">
              <p class="font-semibold text-[#3063af] my-4">Program kerja</p>
              <ul class="list-inside">
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menjadikan OSIS sebagai wadah aspirasi bagi para siswa.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Mempererat kekeluargaan antara seluruh anggota sekolah.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menciptakan lingkungan sekolah yang kondusif.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
    </div>
    <!-- #CALOND -->
    <img class="h-4 w-full sm:h-24" src="/img/grafis_4.png" alt="" />
  </section>
  <img class="h-24 w-full" src="/img/grafis_4.png" alt="" />

  <img class="h-24 w-full mt-0" src="/img/grafis_3_yellow.png" alt="" />
  <section class="w-full bg-[#fffbe0] mb-0">
    <div class="max-w-5xl mx-auto w-full p-4 sm:w-[1024px]">
      <h1 class="text-3xl text-[#3063af] font-bold sm:text-4xl">
        Calon Ketua OSIS
      </h1>
    </div>

    <!-- CALON -->
    <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
      <div class="flex flex-wrap p-4 flex-col sm:flex-row gap-11">
        <div class="flex-auto w-52 sm:w-[5%]">
          <img src="/img/paslon1_mpk.png" class="max-w-full h-auto" alt="Calon" />
        </div>
        <div class="flex-auto text-slate-800 w-full sm:w-[45%]">
          <div class="mb-8">
            <span class="text-sm font-semibold text-[#3063af]">Caketos 1</span>
            <h2 class="text-3xl font-bold">Yohanes Dwiki Indarto</h2>
            <span class="text-sm">BERSAMA SAYA IDOLA BISA!</span>
          </div>

          <div class="flex flex-wrap flex-col sm:flex-row">
            <div class="flex-auto pr-7 text-sm w-full sm:w-1/3">
              <p class="font-semibold text-[#3063af] my-4">Visi</p>
              <span>Menjadikan OSIS sebagai sarana pengembangan potensi siswa
                agar memiliki karakter Inovatif, Disiplin, Kolaboratif serta
                beriman kepada Tuhan Yang Maha Esa dan Meningkatkan pandangan
                baik terhadap OSIS SMKN 8 Semarang agar menjadi sekolah yang
                unggul dalam prestasi.
              </span>
            </div>

            <div class="flex-auto pr-7 w-full text-sm sm:w-1/3">
              <p class="font-semibold text-[#3063af] my-4">Misi</p>
              <ul class="list-inside border-box">
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menjadikan OSIS sebagai wadah aspirasi bagi para siswa.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Mempererat kekeluargaan antara seluruh anggota sekolah.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menciptakan lingkungan sekolah yang kondusif.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Merangkul siswa supaya lebih aktif dalam kegiatan sekolah.
                </li>
              </ul>
            </div>

            <div class="flex-auto pr-7 text-sm">
              <p class="font-semibold text-[#3063af] my-4">Program kerja</p>
              <ul class="list-inside">
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menjadikan OSIS sebagai wadah aspirasi bagi para siswa.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Mempererat kekeluargaan antara seluruh anggota sekolah.
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-1.5 text-[#3063af]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                  </svg>

                  Menciptakan lingkungan sekolah yang kondusif.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
    </div>
    <!-- #CALOND -->

    <img class="h-24 w-full" src="/img/grafis_4.png" alt="" />
  </section>

  <img class="h-24 w-full" src="/img/grafis_5.png" alt="" />
  <section class="p-14 text-white"
    style="
        background: linear-gradient(
            180deg,
            rgba(8, 56, 127, 1) 0%,
            rgba(11, 77, 175, 1) 100%
          )
          no-repeat;
      ">
    <div class="flex flex-wrap flex-col gap-20 sm:flex-row sm:gap-60 w-[90%] mx-auto">
      <div class="flex-auto w-full sm:w-[10%]">
        <h1 class="text-4xl font-bold w-full my-7 sm:w-96">
          Sudah siap untuk memilih pilihanmu?
        </h1>
        <span class="w-96">Jika kamu sudah memiliki pilihan, tekan tombol dibawah ini untuk
          memilih paslon.
        </span>
      </div>

      <div class="flex-auto sm:self-center">
        <img class="sm:w-[50%]mt-8" src="/img/grafis_6.svg" alt="" />
      </div>
    </div>
    <div class="w-[90%] mx-auto">
      <a class="block w-52 font-semibold rounded-full bg-[#08387f] text-white py-4 px-12 mt-12 hover:bg-[#083e90]"
        href="{{ route('vote') }}">Pilih Sekarang</a>
    </div>
  </section>
</body>

</html>
