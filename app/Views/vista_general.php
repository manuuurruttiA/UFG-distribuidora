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
            --card-bg: rgba(255, 255, 255, 0.05);
        }

        body {
            background-color: var(--bg-dark);
            color: #ffffff;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            overflow-x: hidden;
        }

        /* Fondo con gradiente radial sutil */
        .main-wrapper {
            min-height: 100vh;
            background: radial-gradient(circle at 10% 20%, rgba(255, 87, 34, 0.1) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(0, 123, 255, 0.1) 0%, transparent 40%);
            display: flex;
            flex-direction: column;
            justify-content: center;
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

        .text-accent {
            color: var(--accent-orange);
        }

        /* Estilo de la Tarjeta Glassmorphism */
        .glass-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 3rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            color: white;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-orange);
            transform: translateY(-10px);
            color: white;
        }

        .btn-main {
            background-color: white;
            color: black;
            font-weight: 700;
            border-radius: 12px;
            padding: 12px 30px;
            border: none;
            transition: 0.3s;
        }

        .btn-main:hover {
            background-color: var(--accent-orange);
            color: white;
        }

        .stats-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #666;
            display: block;
        }

        .stats-value {
            font-size: 1.5rem;
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="container">
        <div class="row align-items-center g-5">
            
            <div class="col-lg-6">
                <img src="<?= base_url('assets/images/logo_ufgw.png') ?>" alt="UFG Logo" class="logo-img">
                
                <h1 class="hero-title">
                    Gestionando la Red<br>
                    <span class="text-accent">Cliente por Cliente.</span>
                </h1>
                
                <p class="lead text-secondary mb-5" style="max-width: 450px;">
                    Archivo centralizado de gestión para <b>Urrutia Food Group</b>. Acceso rápido a facturación, pedidos y logística en tiempo real.
                </p>

                <div class="d-flex gap-3">
                    <a href="<?= base_url('clientes') ?>" class="btn btn-main shadow-lg">Explorar Clientes</a>
                    <div class="ms-4 border-start ps-4 d-none d-md-block">
                        <span class="stats-value">100%</span>
                        <span class="stats-label">Sincronizado</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <a href="<?= base_url('clientes') ?>" class="glass-card text-center">
                    <div class="mb-4">
                        <div class="display-1 text-accent mb-3">👥</div>
                        <h2 class="fw-bold">Gestión de Clientes</h2>
                        <p class="text-secondary">Click para abrir el listado maestro y gestión de cuentas.</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-top border-secondary">
                        <div class="row">
                            <div class="col-6">
                                <span class="stats-label">Zonas</span>
                                <span class="stats-value">4</span>
                            </div>
                            <div class="col-6">
                                <span class="stats-label">Status</span>
                                <span class="text-success small">● Online</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>