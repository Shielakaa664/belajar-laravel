<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-family: 'Segoe UI', sans-serif; min-height: 100vh; display: flex; align-items: center; }
        .login-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); max-width: 450px; margin: auto; }
        .btn-login { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px; border-radius: 10px; font-weight: bold; width: 100%; }
        .btn-login:hover { opacity: 0.9; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <div class="text-center mb-4">
                        <i class="fas fa-gift fa-3x text-primary"></i>
                        <h2 class="mt-2">ParselKu</h2>
                        <p class="text-muted">Login untuk melanjutkan</p>
                    </div>
                    
                    <div id="errorMsg" class="alert alert-danger" style="display: none;"></div>
                    
                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="admin / user" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="password" required>
                        </div>
                        <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt me-2"></i> Login</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted">Demo: admin/admin123 | user/user123</small><br>
                        <a href="{{ url('/register') }}" class="text-primary">Belum punya akun? Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi data user di localStorage
        function initUsers() {
            if (!localStorage.getItem('users')) {
                const users = [
                    { username: 'admin', password: 'admin123', name: 'Administrator', role: 'admin', email: 'admin@parselku.com' },
                    { username: 'user', password: 'user123', name: 'User Biasa', role: 'user', email: 'user@parselku.com' }
                ];
                localStorage.setItem('users', JSON.stringify(users));
            }
        }
        
        // Handle login
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            initUsers();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const users = JSON.parse(localStorage.getItem('users'));
            
            const user = users.find(u => u.username === username && u.password === password);
            
            if (user) {
                // Simpan user yang login ke localStorage
                localStorage.setItem('currentUser', JSON.stringify({
                    username: user.username,
                    name: user.name,
                    role: user.role,
                    email: user.email
                }));
                
                // Redirect berdasarkan role
                if (user.role === 'admin') {
                    window.location.href = '{{ url("/admin/dashboard") }}';
                } else {
                    window.location.href = '{{ url("/user/dashboard") }}';
                }
            } else {
                document.getElementById('errorMsg').style.display = 'block';
                document.getElementById('errorMsg').innerHTML = 'Username atau password salah!<br><small>Gunakan: admin/admin123 atau user/user123</small>';
            }
        });
        
        initUsers();
    </script>
</body>
</html>