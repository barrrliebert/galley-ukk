<?php

include "./koneksi.php";

session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}

function getUserProfile($conn, $userid)
{
    $query = mysqli_query($conn, "SELECT * FROM user WHERE userid = $userid");
    return mysqli_fetch_assoc($query);
}

$user = isset($_SESSION['userid']) ? getUserProfile($conn, $_SESSION['userid']) : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+z0I5t9zwnlOP6a7tRO0pgdeU4jre0o9W6cd9c3i8a7b/Dmm7vcubGcRtIUUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="font-sans bg-gray-100">
<?php include 'navbar.php'; ?>
    <div class=" p-4">
        <h1 class="text-3xl text-center text-gray-800">Halaman Foto</h1>
        <p class="text-center mt-2">Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    </div>

    <div class="container mx-auto">
    <button id="btnTambahfoto" class="fixed bottom-10 right-10 z-50 text-white bg-gray-400 p-4 rounded-full hover:bg-gray-600 hover:text-blue-400 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
            <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
        </svg>
    </button>

<!-- Main modal -->
<div id="formModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full">
    <div class="relative p-4 w-full max-w-md">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Foto
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" id="closeModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form id="formTambahfoto" action="tambah_foto.php" method="post" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label for="judulfoto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Foto</label>
                        <input type="text" name="judulfoto" id="judulfoto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan judul foto" required />
                    </div>
                    <div>
                        <label for="deskripsifoto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Foto</label>
                        <input type="text" name="deskripsifoto" id="deskripsifoto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan deskripsi foto" required />
                    </div>
                    <div>
                        <label for="lokasifile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi File</label>
                        <input type="file" name="lokasifile" id="lokasifile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="albumid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album</label>
                        <select name="albumid" id="albumid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <?php
                                include "koneksi.php";
                                $userid=$_SESSION['userid'];
                                $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                                while($data=mysqli_fetch_array($sql)){
                            ?>
                                <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Foto</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container mx-auto mt-8 p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <?php
        include "koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn,"SELECT * FROM foto,album WHERE foto.userid='$userid' AND foto.albumid=album.albumid ORDER BY foto.tanggalunggah DESC");
        while($data=mysqli_fetch_array($sql)){
    ?>
        <div class="bg-white border rounded-md overflow-hidden shadow-md transform transition-transform ease-in-out hover:scale-105 relative">
            <!-- Container untuk gambar -->
            <div class="relative" style="padding-bottom: 56.25%;">
                <!-- Padding bottom 56.25% untuk membuat rasio 16:9 -->
                <a href="detail.php?fotoid=<?= $data['fotoid'] ?>">
                <img src="gambar/<?=$data['lokasifile']?>" alt="<?=$data['judulfoto']?>" class="absolute inset-0 w-full h-full object-cover rounded-md">
                </a>
            </div>
            <!-- Container untuk teks -->
            <div class="p-4">
                <div class="text-lg font-bold mb-2"><?=$data['judulfoto']?></div>
                <p class="text-sm text-gray-700 mb-2"><?=$data['deskripsifoto']?></p>
                <p class="text-sm text-gray-700 mb-2"> <?=$data['tanggalunggah']?></p>
                <p class="text-sm text-gray-700 mb-2">Album: <?=$data['namaalbum']?></p>
                <p class="text-sm text-gray-700 mb-2">Disukai: 
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </p>
                <div class="flex justify-between items-center mt-4">
                    <a href="#" class="text-red-500 hover:underline delete-photo" data-fotoid="<?= $data['fotoid'] ?>"><i class="fa-solid fa-trash"></i></a>
                    <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Show the modal when the button is clicked
    document.getElementById("btnTambahfoto").addEventListener("click", function() {
        document.getElementById("formModal").classList.remove("hidden");
    });

    // Close the modal when the close button is clicked
    document.getElementById("closeModal").addEventListener("click", function() {
        document.getElementById("formModal").classList.add("hidden");
    });

    // Close the modal when clicking outside of the modal content
    document.getElementById("formModal").addEventListener("click", function(event) {
        if (event.target == this) {
            document.getElementById("formModal").classList.add("hidden");
        }
    });

    // Form validation
    document.getElementById("formTambahfoto").addEventListener("submit", function(event) {
        var judulfoto = document.getElementById("judulfoto").value.trim();
        var deskripsifoto = document.getElementById("deskripsifoto").value.trim();
        var lokasifile = document.getElementById("lokasifile").value.trim();
        
        if (judulfoto === '' || deskripsifoto === '' || lokasifile === '') {
            alert("Semua kolom harus diisi.");
            event.preventDefault();
        }
    });

    // SweetAlert2 delete confirmation
    document.querySelectorAll('.delete-photo').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const fotoid = this.getAttribute('data-fotoid');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Foto ini akan dihapus secara permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `hapus_foto.php?fotoid=${fotoid}`;
                }
            });
        });
    });
</script>
</body>
</html>
