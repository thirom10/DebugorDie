<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FNAF - Into The Pit - Iniciar Sesión</title>
    <link rel="stylesheet" href="public/assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="header">
                <h1 class="title">FNAF</h1>
                <p class="subtitle">INTO THE PIT</p>
            </div>
            
            <div class="form-container">
                <h2 class="form-title">INICIAR SESIÓN</h2>
                
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-error">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
                
                <form class="login-form" method="POST" action="index.php?action=process_login">
                    <div class="input-group">
                        <label for="username">USUARIO</label>
                        <input type="text" id="username" name="username" placeholder="INGRESA TU USUARIO" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="password">CONTRASEÑA</label>
                        <input type="password" id="password" name="password" placeholder="INGRESA TU CONTRASEÑA" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">ENTRAR AL PIT</button>
                </form>
                
                <div class="register-link">
                    <a href="index.php?action=register">¿NO TIENES CUENTA? REGÍSTRATE AQUÍ</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>