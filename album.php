<?php
include "./koneksi.php";
session_start();
if (!isset($_SESSION['userid'])) {
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
    <title>Halaman Album</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">
    <?php include 'navbar.php'; ?>
    <div class="p-4">
        <h1 class="text-3xl text-center text-gray-800">Halaman Album</h1>
        <p class="text-center mt-2">Selamat datang <b><?= $_SESSION['namalengkap'] ?></b></p>
    </div>

    <div class="container mx-auto mt-8 p-4">
        <button id="btnTambahAlbum" class="fixed bottom-10 right-10 z-50 text-white bg-gray-400 p-4 rounded-full hover:bg-gray-600 hover:text-blue-400 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </button>

        <!-- Main modal -->
        <div id="formModalAlbum" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full">
            <div class="relative p-4 w-full max-w-md">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Album
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" id="closeModalAlbum">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form id="formTambahAlbum" action="tambah_album.php" method="post" class="space-y-4">
                            <div>
                                <label for="namaalbum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Album</label>
                                <input type="text" name="namaalbum" id="namaalbum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan nama album" required />
                            </div>
                            <div>
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan deskripsi album" required />
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Album</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
            <div class="bg-white border rounded-md overflow-hidden shadow-md transform transition-transform ease-in-out hover:scale-105">
                <div class="p-4">
                    <a href="album_detail.php?albumid=<?= $data['albumid'] ?>" class="block">
                        <h2 class="text-lg font-semibold mb-2"><?= $data['namaalbum'] ?></h2>
                        <p class="text-sm text-gray-700 mb-2"><?= $data['deskripsi'] ?></p>
                        <p class="text-xs text-gray-500">Tanggal dibuat: <?= $data['tanggaldibuat'] ?></p>
                    </a>
                    <div class="mt-4 flex justify-between">
                        <a href="javascript:void(0);" class="text-red-500 hover:underline" onclick="confirmDelete('hapus_album.php?albumid=<?= $data['albumid'] ?>')"><i class="fa-solid fa-trash"></i></a>
                        <a href="edit_album.php?albumid=<?= $data['albumid'] ?>" class="text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Show the modal when the button is clicked
        document.getElementById("btnTambahAlbum").addEventListener("click", function() {
            document.getElementById("formModalAlbum").classList.remove("hidden");
        });

        // Close the modal when the close button is clicked
        document.getElementById("closeModalAlbum").addEventListener("click", function() {
            document.getElementById("formModalAlbum").classList.add("hidden");
        });

        // Close the modal when clicking outside of the modal content
        document.getElementById("formModalAlbum").addEventListener("click", function(event) {
            if (event.target == this) {
                document.getElementById("formModalAlbum").classList.add("hidden");
            }
        });

        // Form validation
        document.getElementById("formTambahAlbum").addEventListener("submit", function(event) {
            var namaalbum = document.getElementById("namaalbum").value.trim();
            var deskripsi = document.getElementById("deskripsi").value.trim();

            if (namaalbum === '' || deskripsi === '') {
                alert("Semua kolom harus diisi.");
                event.preventDefault();
            }
        });

        // SweetAlert2 delete confirmation
        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
</body>

</html>
