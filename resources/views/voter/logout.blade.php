<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Terima Kasih!</title>
</head>

<body>
  <img class="absolute left-0 -z-30 block sm:hidden" src="{{ asset('img/Grafis_8_S.svg') }}" />
  <img class="absolute h-full right-0 -z-30 hidden sm:block" src="{{ asset('img/Grafis_8_L.svg') }}" />

  <div class="max-w-lg  p-0 flex mx-auto h-full">
    <div class="flex-wrap">
      <div class="flex-auto ">
        <div class="p-0 px-3 mt-5">
          <div class="content p-0 mb-lg-5">
            <div class="text-5xl sm:text-7xl">
              <h1>1</h1>
              <h1>dari</h1>
              <h1>1000</h1>
            </div>
            <p class="text-lg sm:text-xl font-light my-5">
              Satu suara yang telah kalian berikan akan sangat mempengaruhi
              hasil pemilihan Ketua OSIS dan Pasangan Calon Wakil & Ketua MPK
              SMK Negeri 8 Semarang nanti.
            </p>
            <p class="text-lg sm:text-xl font-light my-5">
              Terima kasih telah berkontribusi untuk membangun masa depan SMK
              Negeri 8 Semarang bersama dengan pemimpin terbaik hasil
              demokrasi kita bersama.
            </p>
            <p class="text-lg sm:text-xl font-light my-5 mb-24">
              Seribu perbedaan harus tetap menjadi <br />
              satu suara!
            </p>

            <form action="{{ route('destroy') }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return window.confirm('Yakin ingin keluar?')"
                class="max-w-lg w-11/12 sm:w-full fixed bottom-5 text-center bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded i">
                <span>Keluar</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

</html>
