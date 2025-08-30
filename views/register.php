<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FNAF - Into The Pit - Registro</title>
    <link rel="stylesheet" href="public/assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="register-card">
            <div class="header">
                <h1 class="title">FNAF</h1>
                <p class="subtitle">INTO THE PIT</p>
            </div>
            
            <div class="form-container">
                <h2 class="form-title">REGISTRO</h2>
                
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-error">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                
                <form class="register-form" method="POST" action="index.php?action=process_register">
                    <div class="input-group">
                        <label for="username">USUARIO</label>
                        <input type="text" id="username" name="username" placeholder="ELIGE UN USUARIO" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="email">EMAIL</label>
                        <input type="email" id="email" name="email" placeholder="TU@EMAIL.COM" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="password">CONTRASEÑA</label>
                        <input type="password" id="password" name="password" placeholder="CREA UNA CONTRASEÑA" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="confirm_password">CONFIRMAR CONTRASEÑA</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="REPITE TU CONTRASEÑA" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">CREAR CUENTA</button>
                </form>
                
                <div class="login-link">
                    <a href="index.php?action=login">¿YA TIENES CUENTA? INICIA SESIÓN AQUÍ</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>