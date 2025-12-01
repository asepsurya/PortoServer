@extends('layouts.app')
@section('title', 'Tambah Postingan')
@section('container')
<!-- Summernote CSS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.3.0/tinymce.min.js" referrerpolicy="origin"></script>
<style>
    .editor-wrapper {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 20px;
        padding: 20px;
    }
    .post-title-input {
        border: none;
     
        font-size: 20px;
        font-weight: 500;
        padding: 10px ;
        outline: none;
        width: 100%;
    }
  
    .sidebar-box {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
    }
    .sidebar-box h6 {
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }
</style>
<style>
    /* Hilangkan sudut membulat TinyMCE */
    .tox-tinymce, 
    .tox .tox-editor-container,
    .tox .tox-edit-area iframe,
    .tox .tox-toolbar,
    .tox .tox-menubar {
        border-radius: 0 !important;
    }
    .tox-tinymce {
    height: calc(100vh - 150px) !important; /* bisa disesuaikan */
}
</style>

<div class="editor-wrapper">

    <!-- ======================= LEFT MAIN ======================= -->
    <div>

        {{-- Judul --}}
        <input type="text" name="title" class="post-title-input" placeholder="Judul" id="title">

        {{-- Toolbar WYSIWYG --}}
        <textarea id="tinymce-editor"></textarea>
    </div>

    <!-- ======================= RIGHT SIDEBAR ======================= -->
    <div>
<div class="d-flex justify-content-between mb-3 align-items-center" style="gap: .22rem;">


    <!-- Preview Button -->
    <button class="btn btn-outline-secondary d-flex align-items-center gap-2 px-3">
        <i class="icon-base ti tabler-eye icon-22px"></i>
        Pratinjau
    </button>

    <!-- Publish Button -->
    <button class="btn btn-primary waves-effect waves-light gap-2 px-4 fw-semibold">
        <i class="icon-base ti tabler-send icon-22px   me-1 "></i>
        Publikasikan
    </button>

</div>

        <div class="sidebar-box">
            <h6>Label</h6>
            <input type="text" class="form-control mt-2" placeholder="label" id="label">
        </div>

        <div class="sidebar-box">
            <h6>Dipublikasikan pada</h6>
            <small>{{ now()->format('d/m/Y H:i') }}</small>
        </div>

        <div class="sidebar-box">
            <h6>Permalink</h6>
            <input type="text" class="form-control mt-2" placeholder="slug-post" id="slug">
        </div>

        <div class="sidebar-box">
            <h6>Lokasi</h6>
            <input type="text" class="form-control mt-2" placeholder="Tambahkan lokasi">
        </div>

        <div class="sidebar-box">
            <h6>Deskripsi Penelusuran</h6>
            <textarea class="form-control mt-2" rows="3"></textarea>
        </div>

    </div>
</div>
<script>
    
tinymce.init({
    selector: '#tinymce-editor',
    height: 500,
    menubar: false,
    plugins: 'link image media table lists code wordcount autolink emoticons fullscreen ',
    toolbar: `
        code|
        undo redo |
        blocks fontfamily fontsize |
        bold italic underline strikethrough forecolor backcolor |
        alignleft aligncenter alignright alignjustify |
        bullist numlist outdent indent |
        link image media emoticons |
        table |
        removeformat |
        fullscreen code
    `,
    images_upload_url: '/upload-image', // bisa diganti route laravel
    automatic_uploads: true,
    file_picker_types: 'image',
});
</script>
<script>
    const titleInput = document.getElementById('title');
    const slugInput  = document.getElementById('slug');

    titleInput.addEventListener('input', function() {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')   // hapus karakter aneh
            .replace(/\s+/g, '-')           // spasi → -
            .replace(/-+/g, '-');           // hapus double --
        
        slugInput.value = slug;
    });
</script>
@endsection


