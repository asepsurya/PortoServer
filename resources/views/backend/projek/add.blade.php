@extends('layouts.app')
@section('title', 'Tambah Projek')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<style>
    /* Hilangkan sudut membulat TinyMCE */
    .tox-tinymce,
    .tox .tox-editor-container,
    .tox .tox-edit-area iframe,
    .tox .tox-toolbar,
    .tox .tox-menubar {
        border-radius: 0 !important;
    }


    .modal-backdrop.show {
        z-index: 1999 !important;
        /* backdrop tetap di bawah modal */
    }

    #imageGalleryModal.modal.show {
        z-index: 2000 !important;
        /* modal di atas semua elemen */
    }

    #cropModal.modal.show {
        z-index: 2000 !important;
        /* modal di atas semua elemen */
    }

    .tox-tinymce {
        height: 100vh !important;
    }

    .tox-edit-area iframe {
        height: calc(100vh - 70px) !important;
        /* 70px = tinggi toolbar */
    }

</style>
@endsection
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <!-- LEFT CONTENT -->
            <div class="col-lg-8">


                <!-- TITLE -->
                <div class="mb-4">
                    <input type="text" name="title" id="title" class="form-control form-control-lg border-0 border-bottom rounded-0 shadow-none fw-semibold" placeholder="Judul Project..." required>
                </div>

                <!-- DESCRIPTION EDITOR -->


                <textarea id="description" name="description"></textarea>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3 align-items-center">
                            <!-- Preview Button -->
                            <a href="/project" type="button" class="btn btn-outline-secondary d-flex align-items-center gap-2 px-3">
                                <i class="icon-base ti tabler-arrow-left icon-22px"></i> Kembali
                            </a>

                            <!-- Publish Button -->
                            <div class="btn-group">

                                <!-- Tombol Utama -->
                                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2 px-4 fw-semibold">
                                    <i class="icon-base ti tabler-send icon-22px"></i> Submit
                                </button>

                                <!-- Toggle Dropdown -->
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>

                                <!-- Menu -->
                                <ul class="dropdown-menu shadow-sm">
                                    <li>
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="submit" name="status" value="0">
                                            <i class="icon-base ti tabler-pencil icon-22px"></i> Simpan sebagai Draft
                                        </button>
                                    </li>

                                    <li>
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="submit" name="status" value="1">
                                            <i class="icon-base ti tabler-send icon-22px"></i> Publikasikan
                                        </button>
                                    </li>
                                </ul>
                            </div>


                        </div>

                    </div>
                </div>


                <!-- PERMALINK -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="fw-semibold mb-2">Permalink</h6>
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="slug-project">
                    </div>
                </div>

                <!-- CATEGORY -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="fw-semibold mb-2">Kategori</h6>

                        <!-- Select + tombol tambah -->
                        <div class="mb-2 align-items-start gap-2 w-full">
                            <select name="category_id[]" class="form-select select2" multiple id="categorySelect">
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="mt-3 w-100 btn btn-outline-primary flex-shrink-0" id="addCategoryBtn">
                                Tambah
                            </button>
                        </div>

                        <!-- Form tambah kategori baru (hidden) -->
                        <div id="newCategoryForm" class="mt-2" style="display:none;">
                            <div class="input-group">
                                <input type="text" id="newCategoryName" class="form-control" placeholder="Nama kategori baru">
                                <button class="btn btn-success" type="button" id="saveNewCategoryBtn">Simpan</button>
                                <button class="btn btn-secondary" type="button" id="cancelNewCategoryBtn">Batal</button>
                            </div>
                            <div id="categoryFormLoading" style="display:none; margin-top:5px;">
                                <span class="spinner-border spinner-border-sm text-primary"></span>
                                Menyimpan kategori baru...
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PROJECT IMAGE -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="fw-semibold mb-2">Gambar Project</h6>

                        <!-- Input Gambar -->
                        <input type="file" id="imageInput" class="form-control" accept="image/*">

                        <!-- Hasil Crop -->
                        <input type="" name="image_cropped" id="imageCropped">
                    </div>
                </div>

                <!-- LINK -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="fw-semibold mb-2">Link Project</h6>
                        <input type="text" name="link" class="form-control" placeholder="https://namaproject.com">
                    </div>
                </div>

            </div>
        </div>
</div>

</form>
<!-- Modal Cropper -->
<!-- Modal Cropper -->
<div class="modal fade" id="cropModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Crop Thumbnail</h5>
            </div>

            <!-- Loader Overlay -->
            <div id="cropLoader" style="position:absolute; top:0; left:0; width:100%; height:100%; 
                 background:rgba(255,255,255,0.8); display:flex; align-items:center; 
                 justify-content:center; z-index:10; font-size:22px; display:none;">
                <div class="spinner-border" role="status"></div>
            </div>

            <div class="modal-body d-flex justify-content-center">

                <div id="cropContainer" style="width:100%; max-width:500px; height:450px; 
                                position:relative; background:#f1f1f1; 
                                display:flex; align-items:center; justify-content:center; 
                                overflow:hidden; border-radius:8px;">

                    <img id="previewImage" style="max-width:100%; max-height:100%; object-fit:contain; display:none;">
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="cropBtn" class="btn btn-primary">
                    Crop & Save
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="imageGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" style="height:500px; max-height:500px; overflow-y:auto;">
                <!-- Tabs -->
                <ul class="nav nav-tabs mb-3" id="galleryTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab">Gallery</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab">Upload</button>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content" id="galleryTabContent">

                    <!-- Gallery Tab -->
                    <div class="tab-pane fade show active" id="gallery" role="tabpanel">
                        <div class="row g-2" id="galleryGrid">
                            @foreach ($images as $image)
                            <div class="col-6 col-md-3 position-relative">
                                <img src="/storage/{{ $image->image }}" class="img-fluid img-thumbnail gallery-image" data-src="/storage/{{ $image->image }}" style="cursor:pointer; height:150px; object-fit:cover; width:100%;">
                                <div class="form-check position-absolute top-0 end-0 m-1">
                                    <input class="form-check-input select-checkbox" type="checkbox" data-src="/storage/{{ $image->image }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Upload Tab -->
                    <div class="tab-pane fade" id="upload" role="tabpanel">
                        <div id="dropZone" style="border:2px dashed #ccc; padding:20px; text-align:center; cursor:pointer;">
                            Tarik atau klik untuk upload gambar baru
                            <input type="file" id="fileInput" multiple style="display:none;">
                        </div>
                        <div id="uploadLoading" class="text-center mt-2" style="display:none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Uploading...</span>
                            </div>
                            <p>Uploading...</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="insertSelectedBtn">Tambahkan ke Editor</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>





@section('js')
{{-- TinyMCE --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.3.0/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    let cropper;

    document.getElementById('imageInput').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let reader = new FileReader();

        reader.onload = function(event) {
            let img = document.getElementById('previewImage');
            img.src = event.target.result;

            // Tampilkan loader
            document.getElementById('cropLoader').style.display = 'flex';
            img.style.display = 'none';

            // Buka modal
            let modal = new bootstrap.Modal(document.getElementById('cropModal'));
            modal.show();

            // Matikan cropper lama dulu
            if (cropper) cropper.destroy();

            // Tunggu modal muncul agar cropper bisa membaca ukuran
            setTimeout(() => {
                cropper = new Cropper(img, {
                    aspectRatio: 600 / 400
                    , viewMode: 1
                    , responsive: true
                    , ready() {
                        // Hilangkan loader setelah cropper siap
                        document.getElementById('cropLoader').style.display = 'none';
                        img.style.display = 'block';
                    }
                });
            }, 300);
        };

        reader.readAsDataURL(file);
    });


    document.getElementById('cropBtn').addEventListener('click', function() {
        let canvas = cropper.getCroppedCanvas({
            width: 600
            , height: 400
        , });

        document.getElementById('imageCropped').value = canvas.toDataURL("image/jpeg", 0.9);

        bootstrap.Modal.getInstance(document.getElementById('cropModal')).hide();
    });

</script>


<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#categorySelect').select2({
            placeholder: 'Pilih kategori'
            , allowClear: true
        });

        // Tampilkan form ketika klik tombol "Tambah"
        $('#addCategoryBtn').click(function() {
            $('#newCategoryForm').slideDown();
            $('#newCategoryName').focus();
        });

        // Batal tambah kategori
        $('#cancelNewCategoryBtn').click(function() {
            $('#newCategoryForm').slideUp();
            $('#newCategoryName').val('');
        });

        // Simpan kategori baru via AJAX
        $('#saveNewCategoryBtn').click(function() {
            var name = $('#newCategoryName').val().trim();
            if (name === '') {
                alert('Masukkan nama kategori.');
                return;
            }

            $('#categoryFormLoading').show();

            $.ajax({
                url: "{{ route('categories.store') }}"
                , method: 'POST'
                , data: {
                    name: name
                    , _token: "{{ csrf_token() }}"
                }
                , success: function(res) {
                    // Tambahkan option baru ke select
                    var newOption = new Option(res.name, res.id, true, true);
                    $('#categorySelect').append(newOption).trigger('change');

                    // Reset form
                    $('#newCategoryName').val('');
                    $('#newCategoryForm').slideUp();
                    $('#categoryFormLoading').hide();
                }
                , error: function(err) {
                    console.error(err);
                    alert('Gagal menyimpan kategori.');
                    $('#categoryFormLoading').hide();
                }
            });
        });
    });

</script>
<script>
    tinymce.init({
        selector: '#description'
        , menubar: false
        , height: "100vh"
        , relative_urls: false
        , remove_script_host: false
        , plugins: 'link image lists media table code fullscreen autoresize forecolor '
        , toolbar: `
               code undo redo | bold italic underline forecolor backcolor | blocks font_size_formats | gallery |
                bullist numlist | alignleft aligncenter alignright alignjustify |
                link media table |  fullscreen | image Quotes
            `
        , branding: false,

        content_style: `
                body { font-family: system-ui; font-size: 15px; }
                img { max-width: 100%; height: auto; }
                .mce-content-body { overflow-y: auto; }
            `
        , setup: function(editor) {
            // Tombol Gallery
            editor.ui.registry.addButton('gallery', {
                text: 'Gallery'
                , icon: 'image'
                , onAction: function() {
                    const modalEl = new bootstrap.Modal(document.getElementById('imageGalleryModal'));
                    modalEl.show();
                }
            });

            // Tombol Quotes
            editor.ui.registry.addButton('Quotes', {
                text: 'Quotes'
                , icon: 'blockquote'
                , onAction: function() {
                    const selectedText = editor.selection.getContent() || 'Tulis kutipan di sini...';
                    const quoteHtml = `
                            <div class="post-qoute mt-50">
                                <h6 class="line-height-28 fz-20">
                                    <span class="l-block">${selectedText}</span>
                                    <span class="sub-title main-color mt-20 mb-0">Quotes</span>
                                </h6>
                            </div>
                        `;
                    editor.insertContent(quoteHtml);
                }
            });

            // Fullscreen fix
            editor.on('FullscreenStateChanged', function(e) {
                if (e.state) {
                    editor.getContainer().style.maxHeight = 'none';
                    editor.getContainer().style.height = '100vh';
                } else {
                    editor.getContainer().style.maxHeight = '600px';
                    editor.getContainer().style.height = '';
                }
            });
        }
    });

</script>


{{-- Auto Slug --}}
<script>
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    titleInput.addEventListener('input', function() {
        const s = this.value.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        slugInput.value = s;
    });

</script>
{{-- drag gambar --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const galleryGrid = document.getElementById('galleryGrid');
        const uploadLoading = document.getElementById('uploadLoading');
        const insertBtn = document.getElementById('insertSelectedBtn');
        const modalEl = document.getElementById('imageGalleryModal');

        // Klik area = trigger file input
        dropZone.addEventListener('click', () => fileInput.click());

        // Drag & Drop events
        dropZone.addEventListener('dragover', e => {
            e.preventDefault();
            dropZone.style.background = '#f0f0f0';
        });
        dropZone.addEventListener('dragleave', e => {
            e.preventDefault();
            dropZone.style.background = 'transparent';
        });
        dropZone.addEventListener('drop', e => {
            e.preventDefault();
            dropZone.style.background = 'transparent';
            uploadFiles(e.dataTransfer.files);
        });
        fileInput.addEventListener('change', e => uploadFiles(e.target.files));

        // Upload function
        function uploadFiles(files) {
            if (!files.length) return;

            const formData = new FormData();
            for (let i = 0; i < files.length; i++) formData.append('images[]', files[i]);

            uploadLoading.style.display = 'block';

            fetch("{{ route('media.store.drop') }}", {
                    method: 'POST'
                    , headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                    , body: formData
                })
                .then(res => res.json())
                .then(data => {
                    uploadLoading.style.display = 'none';
                    if (data.success && data.images) {
                        data.images.forEach(img => {
                            const col = document.createElement('div');
                            col.className = 'col-6 col-md-3 position-relative';
                            col.innerHTML = `
                        <img src="/storage/${img}" 
                             class="img-fluid img-thumbnail gallery-image"
                             data-src="/storage/${img}"
                             style="cursor:pointer; height:150px; object-fit:cover; width:100%;">
                        <div class="form-check position-absolute top-0 end-0 m-1">
                            <input class="form-check-input select-checkbox" type="checkbox" data-src="/storage/${img}">
                        </div>`;
                            galleryGrid.prepend(col);
                        });

                        // Pindah ke tab Gallery
                        const galleryTabEl = document.querySelector('#gallery-tab');
                        const tab = new bootstrap.Tab(galleryTabEl);
                        tab.show();
                    } else {
                        alert('Upload gagal.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    uploadLoading.style.display = 'none';
                    alert('Terjadi kesalahan saat upload.');
                });
        }

        // Multi-insert via checkbox
        insertBtn.addEventListener('click', function() {
            const selected = document.querySelectorAll('.select-checkbox:checked');

            if (selected.length === 0) {
                alert('Pilih gambar dulu.');
                return;
            }

            selected.forEach(cb => {
                const src = cb.dataset.src;
                tinymce.activeEditor.execCommand('mceInsertContent', false
                    , `<img src="${src}" style="max-width:100%; margin-bottom:5px;">`);
                cb.checked = false;
            });

            // Tutup modal setelah multi-insert
            const modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        });

        // Klik satu gambar langsung
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('gallery-image')) {
                const src = e.target.dataset.src;
                tinymce.activeEditor.execCommand('mceInsertContent', false
                    , `<img src="${src}" style="max-width:100%; margin-bottom:5px;">`);
            }

        });
    });

</script>
@endsection
@endsection
