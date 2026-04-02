<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - Distribuidora Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --accent-orange: #ff5722;
            --accent-blue: #007bff;
            --card-bg: rgba(255, 255, 255, 0.05);
        }

        body {
            background-color: var(--bg-dark);
            color: #ffffff;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            overflow-x: hidden;
        }

        .main-wrapper {
            min-height: 100vh;
            background: radial-gradient(circle at 10% 20%, rgba(255, 87, 34, 0.1) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(0, 123, 255, 0.1) 0%, transparent 40%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem 0;
        }

        .logo-img {
            max-width: 180px;
            filter: drop-shadow(0 0 10px rgba(255,255,255,0.2));
            margin-bottom: 2rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .text-accent { color: var(--accent-orange); }

        /* Estilo de la Tarjeta Glassmorphism */
        .glass-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 2.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            color: white;
            height: 100%;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-orange);
            transform: translateY(-10px);
            color: white;
        }

        .card-admin:hover {
            border-color: var(--accent-blue);
        }

        .btn-main {
            background-color: white;
            color: black;
            font-weight: 700;
            border-radius: 12px;
            padding: 12px 30px;
            border: none;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-main:hover {
            background-color: var(--accent-orange);
            color: white;
        }

        .stats-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            display: block;
        }

        .stats-value {
            font-size: 1.2rem;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            .hero-title { font-size: 2.5rem; }
            .glass-card { padding: 1.5rem; }
        }
    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="container">
        <div class="row align-items-center g-5">
            
            <div class="col-lg-5">
                <img src="<?= base_url('assets/images/logo_ufgw.png') ?>" alt="UFG Logo" class="logo-img">
                
                <h1 class="hero-title">
                    Control Total de<br>
                    <span class="text-accent">Distribución.</span>
                </h1>
                
                <p class="lead text-secondary mb-5">
                    Sistema central de <b>Urrutia Food Group</b>. <br>
                    Gestione ventas en calle y logística de productos desde un solo lugar.
                </p>

                <div class="d-flex align-items-center gap-3">
                    <a href="<?= base_url('clientes') ?>" class="btn btn-main shadow-lg">Comenzar Preventa</a>
                    <div class="ms-3 border-start ps-4 d-none d-md-block">
                        <span class="stats-value">Online</span>
                        <span class="stats-label">Sincronización</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row g-4">
                    
                    <div class="col-md-6">
                        <a href="<?= base_url('clientes') ?>" class="glass-card text-center">
                            <div class="mb-4">
                                <div class="display-3 text-accent mb-3">👥</div>
                                <h3 class="fw-bold">Ventas</h3>
                                <p class="text-secondary small">Preventa, toma de pedidos y gestión de clientes.</p>
                            </div>
                            <div class="mt-4 pt-3 border-top border-secondary">
                                <span class="stats-label">Acceso</span>
                                <span class="stats-value text-success">Preventistas</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?= base_url('admin') ?>" class="glass-card card-admin text-center">
                            <div class="mb-4">
                                <div class="display-3 text-primary mb-3">📦</div>
                                <h3 class="fw-bold">Logística</h3>
                                <p class="text-secondary small">Carga de marcas, edición de productos y precios.</p>
                            </div>
                            <div class="mt-4 pt-3 border-top border-secondary">
                                <span class="stats-label">Acceso</span>
                                <span class="stats-value text-warning">Administración</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>