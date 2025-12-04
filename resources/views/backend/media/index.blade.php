@extends('layouts.app')
@section('title', 'Media Gallery')
@section('container')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
            /* Perubahan: shadow dihapus dan border kanan ditambahkan */
            border-right: 1px solid #dee2e6;
        }

        .sidebar .nav-link {
            color: #495057;
            padding: 10px 20px;
            border-radius: 0;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            color: #212529;
        }

        .sidebar .nav-link.active {
            background-color: #dee2e6;
            color: #212529;
            font-weight: 500;
        }

        .main-content {
            padding: 20px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .photo-card {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .photo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .photo-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .photo-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%);
            color: white;
            padding: 15px 10px 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-card:hover .photo-overlay {
            opacity: 1;
        }

        .toolbar {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-options .btn {
            padding: 5px 10px;
            font-size: 14px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .photo-checkbox {
            position: absolute;
            top: 10px;
            left: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-card:hover .photo-checkbox {
            opacity: 1;
        }

        .selected {
            border: 2px solid #0d6efd;
        }
    </style>

    <div class="container-xxl">
        <!-- Main Content -->
        <div class="main-content">
            <div class="toolbar">
                <div class="d-flex align-items-center">
                    <h4 class="me-4">Media Gallery</h4>
                    <div class="btn-group view-options" role="group">
                        <button type="button" class="btn btn-outline-secondary active" title="Grid View">
                            <i class="fas fa-th"></i>
                        </button>
                        <button type="button" class="btn btn-outline-secondary" title="List View">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="input-group me-3" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Search photos...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPhotoModal">
                        <i class="fas fa-plus me-2"></i> Add Photos
                    </button>
                </div>
            </div>

            <!-- Photo Grid -->
            <div class="photo-grid">
                @foreach($images as $item)
                    <div class="photo-card" data-id="{{ $item->id }}">
                        <div class="form-check photo-checkbox">
                            <input class="form-check-input" type="checkbox" id="photo{{ $item->id }}">
                        </div>
                        <img src="/storage/{{ $item->image }}"
                            alt="Photo {{ $item->id }}">
                        <div class="photo-overlay">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Photo {{ $item->id }}</span>
                                <div>
                                    <button class="btn btn-sm btn-outline-light me-1">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-light">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Sample photo cards -->
                @for ($i = 1; $i <= 5; $i++)
                    <div class="photo-card" data-id="{{ $i }}">
                        <div class="form-check photo-checkbox">
                            <input class="form-check-input" type="checkbox" id="photo{{ $i }}">
                        </div>
                        <img src="https://picsum.photos/seed/photo{{ $i }}/400/300.jpg"
                            alt="Photo {{ $i }}">
                        <div class="photo-overlay">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Photo {{ $i }}</span>
                                <div>
                                    <button class="btn btn-sm btn-outline-light me-1">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-light">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Pagination -->
           <div class="mt-3 d-flex justify-content-center d-flex   ">
                {{ $images->links() }}
            </div>

        </div>
    </div>

   <!-- Add Photo Modal -->
<div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="addPhotoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> <!-- <- ini membuat modal center -->
    <div class="modal-content">
      <form id="uploadPhotoForm" action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addPhotoModalLabel">Upload Photo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Title (Optional)</label>
            <input type="text" class="form-control" name="title" id="title">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
          </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link (Optional)</label>
            <input type="url" class="form-control" name="link" id="link">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-center">
       <img id="modalImage"
     src=""
     alt=""
     class="img-fluid mb-2 w-100 rounded "
     style="max-height: 300px; object-fit: contain;">

       <div class="input-group mb-3">
          <input type="text" id="modalUrl" class="form-control" readonly>
          <button class="btn btn-outline-secondary" type="button" id="copyLinkBtn">
            <i class="fas fa-copy"></i> Copy
          </button>
        </div>
        {{-- <a id="modalLink" href="#" class="d-block">Link</a> --}}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="deleteImageBtn">Hapus</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>


@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const copyBtn = document.getElementById('copyLinkBtn');
  const modalUrl = document.getElementById('modalUrl');

  copyBtn.addEventListener('click', function() {
    modalUrl.select();
    modalUrl.setSelectionRange(0, 99999); // untuk mobile
    document.execCommand('copy');
    alert('Link berhasil dicopy!');
  });
});
</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Photo selection
            const photoCards = document.querySelectorAll('.photo-card');
            const checkboxes = document.querySelectorAll('.photo-checkbox input');

            let currentImageId = null;

            // Set modal content dan simpan ID
            photoCards.forEach(card => {
                const img = card.querySelector('img');
                img.addEventListener('click', function(e) {
                    e.stopPropagation();
                    currentImageId = card.dataset.id;

                    const src = this.src;
                    const title = this.alt;
                    const url = src;
                    const link = "#";

                    document.getElementById('modalImage').src = src;
                    document.getElementById('modalImage').alt = title;
                    document.getElementById('imageModalLabel').textContent = title;
                    document.getElementById('modalUrl').value = url;
                    // document.getElementById('modalLink').href = link;

                    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
                    modal.show();
                });
            });

            // Handle delete
            document.getElementById('deleteImageBtn').addEventListener('click', function() {
                if (!currentImageId) return;

                if (!confirm('Yakin ingin menghapus gambar ini?')) return;

                fetch(`/gallery/${currentImageId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Hapus card dari grid
                            const card = document.querySelector(
                                `.photo-card[data-id="${currentImageId}"]`);
                            if (card) card.remove();

                            // Tutup modal
                            const modalEl = document.getElementById('imageModal');
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            modal.hide();

                            currentImageId = null;
                            alert('Gambar berhasil dihapus.');
                        } else {
                            alert('Gagal menghapus gambar.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan.');
                    });
            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle photo selection
            const photoCards = document.querySelectorAll('.photo-card');
            const checkboxes = document.querySelectorAll('.photo-checkbox input');

            photoCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    // Don't toggle if clicking on overlay buttons
                    if (e.target.closest('.photo-overlay')) return;

                    const checkbox = this.querySelector('.photo-checkbox input');
                    checkbox.checked = !checkbox.checked;
                    this.classList.toggle('selected');
                });
            });

            // Prevent checkbox click from bubbling up to card
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function(e) {
                    e.stopPropagation();
                    this.closest('.photo-card').classList.toggle('selected', this.checked);
                });
            });
        });
    </script>
@endsection
@endsection
