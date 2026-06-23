<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-family: 'Segoe UI', sans-serif; min-height: 100vh; display: flex; align-items: center; }
        .register-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        .btn-register { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px; border-radius: 10px; font-weight: bold; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="register-card">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-3x text-primary"></i>
                        <h2 class="mt-2">Daftar Akun</h2>
                        <p class="text-muted">Buat akun untuk memesan parsel</p>
                    </div>
                    
                    <div id="successMsg" class="alert alert-success" style="display: none;"></div>
                    <div id="errorMsg" class="alert alert-danger" style="display: none;"></div>
                    
                    <form id="registerForm">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn-register"><i class="fas fa-check-circle me-2"></i> Daftar</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="{{ url('/login') }}" class="text-primary">Sudah punya akun? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getUsers() {
            return JSON.parse(localStorage.getItem('users')) || [];
        }
        
        function saveUsers(users) {
            localStorage.setItem('users', JSON.stringify(users));
        }
        
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            let users = getUsers();
            
            // Cek apakah username sudah ada
            if (users.find(u => u.username === username)) {
                document.getElementById('errorMsg').style.display = 'block';
                document.getElementById('errorMsg').innerHTML = 'Username sudah digunakan!';
                document.getElementById('successMsg').style.display = 'none';
                return;
            }
            
            // Tambah user baru
            users.push({
                username: username,
                password: password,
                name: name,
                role: 'user',
                email: email
            });
            
            saveUsers(users);
            
            document.getElementById('successMsg').style.display = 'block';
            document.getElementById('successMsg').innerHTML = 'Registrasi berhasil! Silakan login.';
            document.getElementById('errorMsg').style.display = 'none';
            
            // Reset form
            document.getElementById('registerForm').reset();
            
            // Redirect ke login setelah 2 detik
            setTimeout(() => {
                window.location.href = '{{ url("/login") }}';
            }, 2000);
        });
    </script>
</body>
</html>