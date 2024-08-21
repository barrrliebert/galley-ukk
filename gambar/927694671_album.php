
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bottom Navigation</title>
  <link rel="stylesheet" href="./css/all.min.css">
  <link rel="stylesheet" href="./css/fontawesome.min.css">
  <!-- Include the Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Your Alpine.js script -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100">
  <!-- Your content -->
  
  <nav x-data="{ open: false }" class="md:hidden bottom-0 fixed w-full bg-white border-t border-gray-200 z-50">
  <div class="max-w-screen-xl mx-auto px-4 flex justify-between">
    <a class="text-gray-700 flex flex-col items-center py-2 text-xs" href="index.php">
      <i class="fas fa-home mb-1"></i> Home
    </a>
    <a class="text-gray-700 flex flex-col items-center py-2 text-xs" href="album.php">
      <i class="fas fa-images mb-1"></i> Album
    </a>
    <a class="text-gray-700 flex flex-col items-center py-2 text-xs" href="foto.php">
    <i class="fas fa-image mb-1"></i> Foto
    </a>
    <div x-data="{ openDropdown: false }" class="relative">
      <button @click="openDropdown = !openDropdown" class="text-gray-700 flex flex-col items-center py-2 text-xs">
        <!-- Icon for user -->
                  <img src="./gambar/3135715.png" class="w-6 h-6 rounded-full" alt="User Icon">
              </button>
      <div x-show="openDropdown" class="absolute right-0 bottom-full mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                  <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i> My Profile</a>
          <a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?');" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
              </div>
    </div>
  </div>
</nav>




  <!-- Your remaining content -->

  <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 hidden md:block">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="p-4 flex flex-row items-center justify-between">
        <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Fotopia</a>
        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="index.php">Home</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="album.php">Album</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="foto.php">Foto</a>
        <div x-data="{ openDropdown: false }" class="relative md:inline-block" @click.away="openDropdown = false">
          <button @click="openDropdown = !openDropdown" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
              <!-- Tambahkan gaya inline untuk membuat gambar profil menjadi lingkaran -->
                                <img src="./gambar/3135715.png" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;" alt="User Icon">
                        </button>
          <div x-show="openDropdown" class="absolute md:right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-10">
                                <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">My Profile</a>
                  <a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?');" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Logout</a>
                        </div>
        </div>
      </nav>
    </div>
  </div>
</body>
</html>
    <div class="bg-white p-4">
        <h1 class="text-3xl text-center text-gray-800">Halaman Album</h1>
        <p class="text-center mt-2">Selamat datang <b>Admin User</b></p>
    </div>

    <div class="container mx-auto mt-8 p-4">
    <button id="btnTambahAlbum" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Tambah Album</button>
    <form id="formTambahAlbum" action="tambah_album.php" method="post" class="mb-8" style="display: none;">
            <table class="w-full">
                <tr>
                    <td class="py-2">Nama Album</td>
                    <td><input type="text" name="namaalbum" id="namaalbum" class="border p-2 rounded"></td>
                </tr>
                <tr>
                    <td class="py-2">Deskripsi</td>
                    <td><input type="text" name="deskripsi" id="deskripsi" class="border p-2 rounded"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah" class="bg-blue-500 text-white px-4 py-2 rounded"></td>
                </tr>
            </table>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-white border rounded-md overflow-hidden shadow-md transform transition-transform ease-in-out hover:scale-105">
            <div class="p-4">
                <a href="album_detail.php?albumid=25" class="block">
                    <h2 class="text-lg font-semibold mb-2">admin</h2>
                    <p class="text-sm text-gray-700 mb-2">album admin</p>
                    <p class="text-xs text-gray-500">Tanggal dibuat: 2024-02-07</p>
                </a>
                <div class="mt-4 flex justify-between">
                <a href="hapus_album.php?albumid=25" onclick="return confirm('Apakah Anda yakin ingin menghapus album ini?');" class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
                    <a href="edit_album.php?albumid=25" class="text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>
            <div class="bg-white border rounded-md overflow-hidden shadow-md transform transition-transform ease-in-out hover:scale-105">
            <div class="p-4">
                <a href="album_detail.php?albumid=64" class="block">
                    <h2 class="text-lg font-semibold mb-2">Tes</h2>
                    <p class="text-sm text-gray-700 mb-2">tes album</p>
                    <p class="text-xs text-gray-500">Tanggal dibuat: 2024-07-23</p>
                </a>
                <div class="mt-4 flex justify-between">
                <a href="hapus_album.php?albumid=64" onclick="return confirm('Apakah Anda yakin ingin menghapus album ini?');" class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
                    <a href="edit_album.php?albumid=64" class="text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>
    </div>
<script>
        document.getElementById("btnTambahAlbum").addEventListener("click", function() {
            document.getElementById("formTambahAlbum").style.display = "block";
        });

        document.getElementById("formTambahAlbum").addEventListener("submit", function(event) {
            var namaalbum = document.getElementById("namaalbum").value.trim();
            var deskripsi = document.getElementById("deskripsi").value.trim();
            
            if (namaalbum === '' || deskripsi === '') {
                alert("Semua kolom harus diisi.");
                event.preventDefault();
            }
        });
    </script>
</div>
    </div>
</body>
</html>
