<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="bg-violet-800 w-full h-20 items-center flex justify-between">
        <div class="m-8 font-bold text-center text-3xl text-white	color: rgb(0 0 0);;">DATA SISWA</div>
        <div name="search-engine" class="mr-8 py-2 relative">
            <form id="searchForm" action="{{ route('datasiswa.index') }}" method="GET" class="flex">
                <input class="appearance-none border-2 pl-10 border-gray-100 hover:border-violet-800 transition-colors rounded-md w-full py-2 text-gray-800 leading-tight focus:outline-none focus:ring-neutral-600 focus:border-neutral-700 focus:shadow-outline" id="search" name="query" type="text" placeholder="Search..." value="{{ request()->input('query') }}" />
                <button type="submit" class="ml-2 bg-violet-500 hover:bg-violet-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Search
                </button>
            </form>
        </div
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <h2 class="mt-8 font-bold text-center text-3xl">DATA SISWA SMK NEGERI 1 BANTUL</h2>
        <div class="flex justify mt-4">
            <button class="bg-violet-800 text-white font-bold px-3 py-3 rounded" data-modal-target="static-modal" data-modal-toggle="static-modal">Tambahkan Data Siswa</button>
        </div>

        <!-- Modal -->
        <div id="static-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-sbold dark:text-black">
                            Tambah Data Siswa
                        </h3>
                        <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form id="datasiswaFrom121" action="/datasiswa/store" method="POST">
                            @csrf
                            <div class="form-group mb-5">
                                <label for="nama" class="">NAMA: </label>
                                <br>
                                <input type="text" name="nama" id="nama" class="form-control w-full rounded h-10 appearance-none border-2 pl-10 border-gray-300 hover:border-violet-500 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" required>
                            </div>
                            
                            <div class="form-group mb-5">
                                <label for="ttl">TTL: </label>
                                <br>
                                <input type="text" name="ttl" id="ttl" class="form-control w-full rounded h-10 appearance-none border-2 pl-10 border-gray-300 hover:border-violet-500 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none  focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="sekolah">SEKOLAH: </label>
                                <br>
                                <input type="text" name="sekolah" id="sekolah" class="form-control w-full rounded h-10 appearance-none border-2 pl-10 border-gray-300 hover:border-violet-500 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none  focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="keterangan">KETERANGAN: </label>
                                <br>
                                <input type="text" name="keterangan" id="keterangan" class="form-control w-full rounded h-10 appearance-none border-2 pl-10 border-gray-300 hover:border-violet-500 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none  focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-5 bg-violet-500 hover:bg-neutral-600 text-white rounded p-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.search')
        @include('partials.modal-add')
        <div class="mt-8">
            <div class="grid grid-cols-3 gap-4">
                <!-- Card -->
                @foreach($datasiswa as $datasiswa)
                <div class="bg-white p-4 border border-neutral-800 rounded shadow-md">
                    <p>NAMA: {{ $datasiswa->nama }}</p>
                    <p>TTL: {{ $datasiswa->ttl }}</p>
                    <p>SEKOLAH: {{ $datasiswa->sekolah }}</p>
                    <p>KETERANGAN: {{ $datasiswa->keterangan }}</p>
                    <div class="flex space-x-2 py-5 mt-4">
                        <button class="bg-violet-800 text-white font-bold px-3 py-3 rounded" data-modal-target="static-modal{{$datasiswa->id}}" data-modal-toggle="static-modal{{$datasiswa->id}}">EDIT</button>
                        <a href="{{ route('datasiswa.destroy', $datasiswa->id) }}" class="bg-violet-800 text-white font-bold px-3 py-3 rounded">DELETE</a>
                    </div>
                </div>
                @include('partials.modal-edit')
                @endforeach
            </div>
        </div>
    </div>


    <script>


        document.addEventListener('DOMContentLoaded', () => {
                const toggleModalButtons = document.querySelectorAll('[data-modal-target]');
                const hideModalButtons = document.querySelectorAll('[data-modal-hide]');

                toggleModalButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const modalId = button.getAttribute('data-modal-target');
                        const modal = document.getElementById(modalId);
                        modal.classList.toggle('hidden');
                        modal.classList.toggle('flex');
                    });
                });

                hideModalButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const modalId = button.getAttribute('data-modal-hide');
                        const modal = document.getElementById(modalId);
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    });
                });

                window.addEventListener('click', (event) => {
                    hideModalButtons.forEach(button => {
                        const modalId = button.getAttribute('data-modal-hide');
                        const modal = document.getElementById(modalId);
                        if (event.target === modal) {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                        }
                    });
                });
            });
    </script>
</body>
</html>