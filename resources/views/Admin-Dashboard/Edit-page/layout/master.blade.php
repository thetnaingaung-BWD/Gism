<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/Logo/logo_eng-removebg-preview.webp') }}" />
    <title> Preview and edit | GISM</title>
    @vite('resources/css/Customer/app.css')
    @vite('resources/js/Customer/app.js')
    <link rel="stylesheet" href="{{ asset('build/assets/app-DPV_CP_-.css') }}" />

</head>

<body>
    @include('Admin-Dashboard.Edit-page.include.nav')
    @yield('content')
    @include('Admin-Dashboard.Edit-page.include.footer')
    <script>
        function toggleModal(modal_num,file_id){
            const modal = document.getElementById(modal_num);

            modal.classList.toggle('hidden');

        }

        // Image Upload
        function imageUpload(event, modal_num) {

            const modal = document.getElementById(modal_num);
            const parentDiv = modal.querySelector('.parentDiv');
            const fileInput = parentDiv.querySelector('input');
            const previewContainer = modal.querySelector('.imageContainer');
            const files = Array.from(fileInput.files);
            console.log(modal);

            previewContainer.innerHTML = ""; // Clear existing previews

            if (files.length === 1) {
                // Single image full-width display
                files.forEach(file => {
                    if (file.type.startsWith("image/")) {
                        const reader = new FileReader();

                        reader.onload = () => {
                            const imgContainer = document.createElement("div");
                            imgContainer.className = "relative w-full h-60 flex justify-center items-center";

                            const img = document.createElement("img");
                            img.src = reader.result;
                            img.alt = file.name;
                            img.className = "w-full h-full object-cover rounded-lg shadow-sm";

                            const cancelBtn = document.createElement("button");
                            cancelBtn.textContent = "X";
                            cancelBtn.className = "absolute top-2 right-2 bg-red-500 text-white rounded-full px-2 py-1";
                            cancelBtn.onclick = () => {
                                imgContainer.remove();
                                fileInput.value ='';
                                // console.log(fileInput.files);

                            }

                            imgContainer.appendChild(img);
                            imgContainer.appendChild(cancelBtn);

                            previewContainer.appendChild(imgContainer);
                        };

                        reader.readAsDataURL(file);
                    } else {
                        alert(`${file.name} is not an image file.`);
                    }
                });
            } else {
                // Multiple images grid layout
                const gallery = document.createElement("div");
                gallery.className = "grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3";

                files.forEach((file,index) => {
                    if (file.type.startsWith("image/")) {
                        const reader = new FileReader();

                        reader.onload = () => {
                            const imgContainer = document.createElement("div");
                            imgContainer.className = "relative";
                            imgContainer.dataset.index = index;


                            const img = document.createElement("img");
                            img.src = reader.result;
                            img.alt = file.name;
                            img.className = "object-cover object-center w-full h-40 max-w-full rounded-lg";

                            const cancelBtn = document.createElement("button");
                            cancelBtn.textContent = "X";
                            cancelBtn.className = "absolute top-2 right-2 bg-red-500 text-white rounded-full px-2 py-1";
                            cancelBtn.onclick = () => {
                                imgContainer.remove();

                                const dt = new DataTransfer();

                                    files.forEach((item, i) => {

                                    if (i !== Number(imgContainer.dataset.index)) {
                                        dt.items.add(item); // Retain files except the one removed

                                    }
                                });
                                fileInput.files = dt.files; // Update the input's files
                                // console.log(fileInput.files); // Debugging
                            }

                            imgContainer.appendChild(img);
                            imgContainer.appendChild(cancelBtn);

                            gallery.appendChild(imgContainer);
                        };

                        reader.readAsDataURL(file);
                    } else {
                        alert(`${file.name} is not an image file.`);
                    }
                });

                previewContainer.appendChild(gallery);
            }
        }


    </script>
</body>

<script src="{{ asset('build/assets/app-CpHtIrYO.js') }}"></script>
</html>

