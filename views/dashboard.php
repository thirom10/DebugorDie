<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FNAF - Into The Pit - Dashboard</title>
    <link rel="stylesheet" href="public/assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <div class="game-title">
                <h1>FNAF: INTO THE PIT</h1>
                <p class="version">SISTEMA DE ACCESO V1.0</p>
            </div>
            <div class="user-info">
                <span class="user-label">USUARIO CONECTADO:</span>
                <span class="username"><?php echo strtoupper($_SESSION['username']); ?></span>
            </div>
        </div>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <!-- Main Content -->
        <div class="dashboard-main">
            <div class="menu-panel">
                <h2 class="menu-title">MENÚ PRINCIPAL</h2>
                <div class="menu-buttons">
                    <button class="menu-btn primary">INICIAR JUEGO</button>
                    <button class="menu-btn secondary">VER CONTROLES</button>
                    <button class="menu-btn tertiary">GUÍA</button>
                    <button class="menu-btn danger" onclick="window.location.href='index.php?action=logout'">CERRAR SESIÓN</button>
                </div>
            </div>

            <div class="character-panel">
                <div class="character-display">
                    <h3 class="character-title">TU PERSONAJE</h3>
                    <div class="character-avatar"></div>
                    <button class="edit-character-btn">EDITAR PERSONAJE</button>
                </div>
            </div>
        </div>

        <div class="system-panel">
            <div class="system-status">
                <h3 class="panel-title">ESTADO DEL SISTEMA</h3>
                <div class="status-item">
                    <span>CONEXIÓN:</span>
                    <span class="status-value active">ACTIVA</span>
                </div>
                <div class="status-item">
                    <span>FECHA:</span>
                    <span class="status-value"><?php echo date('d/m/Y'); ?></span>
                </div>
                <div class="status-item">
                    <span>ÚLTIMA SESIÓN:</span>
                    <span class="status-value"><?php echo date('H:i:s'); ?></span>
                </div>
            </div>

            <div class="stats-panel">
                <h3 class="panel-title">ESTADÍSTICAS</h3>
                <div class="stat-item">
                    <span>NIVEL:</span>
                    <span class="stat-value">1</span>
                </div>
                <div class="stat-item">
                    <span>EXPERIENCIA:</span>
                    <span class="stat-value">0 XP</span>
                </div>
                <div class="stat-item">
                    <span>PARTIDAS:</span>
                    <span class="stat-value">0</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>