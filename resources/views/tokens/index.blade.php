<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Tokens - Niixto</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* --- Variabel & Gaya Global --- */
        :root {
            --primary-color: #5B47FB; /* Warna ungu dari contoh */
            --primary-hover: #4936d9;
            --danger-color: #DC2626;
            --danger-hover: #B91C1C;
            --success-color: #10B981;
            --background-color: #F9FAFB; /* Abu-abu sangat muda */
            --sidebar-bg: #FFFFFF;
            --card-bg-color: #FFFFFF;
            --text-color: #111827;
            --text-secondary-color: #6B7280;
            --border-color: #E5E7EB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            height: 100vh;
            overflow: hidden; /* Mencegah scroll pada body */
        }

        /* --- Layout Utama --- */
        .app-container {
            display: flex;
            height: 100vh;
        }

        /* --- Sidebar --- */
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            padding: 30px 20px;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-sm);
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding-bottom: 30px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 30px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .user-info {
            margin-left: 15px;
        }
        .user-info h4 {
            font-size: 1rem;
            font-weight: 600;
        }
        .user-info p {
            font-size: 0.8rem;
            color: var(--text-secondary-color);
        }

        .sidebar-nav ul {
            list-style: none;
        }
        .sidebar-nav li {
            margin-bottom: 5px;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--text-secondary-color);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.2s, color 0.2s;
        }
        .sidebar-nav a:hover {
            background-color: #F3F4F6;
            color: var(--text-color);
        }
        .sidebar-nav a.active {
            background-color: rgba(91, 71, 251, 0.1);
            color: var(--primary-color);
            font-weight: 600;
        }
        .sidebar-nav i {
            width: 20px;
            margin-right: 12px;
        }

        /* --- Main Content --- */
        .main-content {
            flex-grow: 1;
            padding: 30px;
            overflow-y: auto; /* Scroll hanya di area konten */
        }

        .content-header {
            margin-bottom: 30px;
        }
        .content-header h1 {
            font-size: 1.875rem;
            font-weight: 700;
        }
        .content-header p {
            color: var(--text-secondary-color);
            margin-top: 5px;
        }

        /* --- Kartu --- */
        .card {
            background-color: var(--card-bg-color);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            padding: 24px;
            margin-bottom: 24px;
        }
        .card-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* --- Form Buat Token --- */
        .create-token-form {
            display: flex;
            gap: 12px;
        }
        .create-token-form input[type="text"] {
            flex-grow: 1;
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .create-token-form input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(91, 71, 251, 0.1);
        }

        /* --- Tombol --- */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-primary:hover {
            background-color: var(--primary-hover);
        }
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }
        .btn-danger:hover {
            background-color: var(--danger-hover);
        }
        .btn-icon {
            background: transparent;
            border: none;
            padding: 8px;
            color: var(--text-secondary-color);
            cursor: pointer;
            border-radius: 6px;
        }
        .btn-icon:hover {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* --- Notifikasi Token Baru --- */
        .notification {
            background-color: var(--success-color);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            animation: slideIn 0.5s ease-out;
        }
        .notification .token-code {
            font-family: 'Courier New', Courier, monospace;
            font-weight: 500;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 4px 8px;
            border-radius: 4px;
            margin-left: 10px;
        }
        
        /* --- Grid Token --- */
        .token-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .token-card {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .token-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }
        .token-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        .token-card-header h4 {
            font-weight: 600;
            font-size: 1.1rem;
        }
        .token-card-body p {
            color: var(--text-secondary-color);
            font-size: 0.9rem;
            margin: 4px 0;
        }
        
        /* --- Empty State --- */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-secondary-color);
        }
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        /* --- Modal Konfirmasi Hapus --- */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.2s;
        }
        .modal-content {
            background-color: var(--card-bg-color);
            margin: 15% auto; 
            padding: 30px;
            border: none;
            border-radius: 12px;
            width: 90%;
            max-width: 450px;
            box-shadow: var(--shadow-lg);
            animation: slideUp 0.3s;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .modal-header h3 {
            margin: 0;
            font-size: 1.25rem;
        }
        .modal-body p {
            color: var(--text-secondary-color);
            line-height: 1.5;
        }
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }
        
        /* --- Animasi --- */
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>

<div class="app-container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="user-profile">
            <div class="user-avatar">U</div>
            <div class="user-info">
                <h4>Nama Pengguna</h4>
                <p>Active</p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#" class="active"><i class="fas fa-key"></i> API Tokens</a></li>
                <li><a href="#"><i class="fas fa-tasks"></i> Tasks</a></li>
                <li><a href="#"><i class="fas fa-chart-line"></i> Progress</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <div class="content-header">
            <h1>API Tokens</h1>
            <p>Kelola token akses untuk integrasi API Anda.</p>
        </div>

        {{-- Notifikasi Token Baru --}}
        @if(session('token'))
            <div class="notification">
                <div>
                    <strong>Token Berhasil Dibuat!</strong>
                    <span class="token-code">{{ session('token') }}</span>
                </div>
                <div class="actions">
                    <button class="btn-icon" onclick="copyToken('{{ session('token') }}')" title="Salin Token">
                        <i class="fas fa-copy"></i>
                    </button>
                    <button class="btn-icon" onclick="this.parentElement.parentElement.style.display='none'" title="Tutup">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @endif

        {{-- Kartu Buat Token --}}
        <div class="card">
            <div class="card-header">
                <h3>Buat Token Baru</h3>
            </div>
            <form action="{{ route('tokens.create') }}" method="POST" class="create-token-form">
                @csrf
                <input type="text" name="name" placeholder="Masukkan nama token (contoh: Aplikasi Mobile)" required>
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-plus"></i> Buat Token
                </button>
            </form>
        </div>

        {{-- Kartu Daftar Token --}}
        <div class="card">
            <div class="card-header">
                <h3>Token Anda</h3>
            </div>
            <div class="token-grid">
                @forelse ($tokens as $token)
                    <div class="token-card">
                        <div class="token-card-header">
                            <h4>{{ $token->name }}</h4>
                            <button class="btn-icon" onclick="confirmDelete('{{ $token->id }}', '{{ $token->name }}')" title="Hapus Token">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="token-card-body">
                            <p><strong>ID:</strong> {{ $token->id }}</p>
                            <p><strong>Dibuat:</strong> {{ $token->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-key"></i>
                        <p>Anda belum memiliki token API.</p>
                        <p>Buat token baru untuk memulai.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </main>
</div>

{{-- Modal Konfirmasi Hapus --}}
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Konfirmasi Hapus</h3>
            <button class="btn-icon" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus token <strong id="token-name-placeholder"></strong>?</p>
            <p style="margin-top: 10px; font-size: 0.9rem;">Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" style="background-color: var(--border-color); color: var(--text-color);" onclick="closeModal()">Batal</button>
            {{-- Form ini akan disubmit secara otomatis oleh JavaScript --}}
            <form id="delete-form" action="" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal konfirmasi hapus
    function confirmDelete(tokenId, tokenName) {
        document.getElementById('token-name-placeholder').innerText = tokenName;
        const form = document.getElementById('delete-form');
        // Ganti '/tokens/' dengan route yang sesuai di aplikasi Laravel Anda
        form.action = `/tokens/${tokenId}`; 
        document.getElementById('deleteModal').style.display = 'block';
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    // Fungsi untuk menyalin token ke clipboard
    function copyToken(token) {
        navigator.clipboard.writeText(token).then(() => {
            // Berikan feedback visual (opsional, bisa diganti dengan toast library)
            // alert('Token berhasil disalin ke clipboard!');
            console.log('Token berhasil disalin ke clipboard!');
        }).catch(err => {
            console.error('Gagal menyalin token: ', err);
            alert('Gagal menyalin token.');
        });
    }

    // Tutup modal jika pengguna mengklik di luar area modal
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>

</body>
</html>