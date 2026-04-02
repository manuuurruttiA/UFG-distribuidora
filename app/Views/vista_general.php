<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFG Distribuidora - Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section { background: #f8f9fa; padding: 60px 0; border-bottom: 1px solid #dee2e6; }
        .card-module { transition: transform 0.2s; cursor: pointer; }
        .card-module:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">UFG Distribuidora</a>
            <span class="navbar-text">Sistema de Gestión Local</span>
        </div>
    </nav>

    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Bienvenido al Sistema</h1>
            <p class="lead">Gestión de inventario, ventas y distribución.</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 card-module">
                    <div class="card-body text-center">
                        <h3 class="card-title">Inventario</h3>
                        <p class="card-text">Control de stock y productos disponibles.</p>
                        <a href="inventario.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 card-module">
                    <div class="card-body text-center">
                        <h3 class="card-title">Ventas</h3>
                        <p class="card-text">Registro de facturas y pedidos de clientes.</p>
                        <a href="ventas.php" class="btn btn-success">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 card-module">
                    <div class="card-body text-center">
                        <h3 class="card-title">Reportes</h3>
                        <p class="card-text">Estadísticas de rendimiento y finanzas.</p>
                        <a href="reportes.php" class="btn btn-warning">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center py-4 text-muted">
        &copy; 2026 UFG Distribuidora - Acceso Local
    </footer>

</body>
</html>