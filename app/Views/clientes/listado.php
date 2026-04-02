<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-base: #1a1a1a;
            --accent: #ff5722;
        }

        body {
            background-color: var(--bg-dark);
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            padding-bottom: env(safe-area-inset-bottom); /* Para iPhone modernos */
        }

        /* --- HEADER Y LOGO AGRANDADO --- */
        .header-ufg {
            padding: 3rem 1rem;
            background: radial-gradient(circle at center, rgba(255,87,34,0.15) 0%, transparent 70%);
        }

        .logo-container {
            transition: transform 0.3s ease;
        }

        .logo-ufg {
            width: 100%;
            max-width: 320px; /* Logo más grande */
            height: auto;
            filter: drop-shadow(0 0 15px rgba(255,255,255,0.1));
        }

        /* --- RESPONSIVE ADJUSTMENTS --- */
        @media (max-width: 768px) {
            .logo-ufg { max-width: 240px; }
            .header-ufg { padding: 2rem 1rem; }
            .hero-title { font-size: 1.8rem; }
        }

        /* --- GRID DE TARJETAS (ESTILO COMPONENT LIBRARY) --- */
        .client-card {
            background: var(--card-base);
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .client-card:active {
            transform: scale(0.96); /* Efecto de presión en touch */
        }

        .card-visual {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .card-info {
            padding: 1.2rem;
        }

        .client-name {
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: -0.5px;
        }

        /* --- COLORES VIBRANTES --- */
        .bg-cyan { background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%); }
        .bg-pink { background: linear-gradient(135deg, #ff0844 0%, #ffb199 100%); }
        .bg-purple { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .bg-orange { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }

        /* Botones de acción rápida */
        .btn-action-sm {
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<header class="header-ufg text-center">
    <div class="container">
        <div class="logo-container mb-4">
            <a href="<?= base_url('/') ?>">
                <img src="<?= base_url('assets/images/logo_ufgw.png') ?>" alt="UFG Logo" class="logo-ufg">
            </a>
        </div>
        <h2 class="fw-bold hero-title">Listado de Clientes</h2>
        <p class="text-secondary small">Selecciona un cliente para gestionar pedidos</p>
    </div>
</header>

<div class="container px-4">
    <div class="row g-4 mb-5">
        <?php 
        $colores = ['bg-cyan', 'bg-pink', 'bg-purple', 'bg-orange'];
        foreach ($clientes as $index => $c): 
            $color = $colores[$index % count($colores)];
        ?>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="client-card shadow-lg" data-bs-toggle="modal" data-bs-target="#modalCliente" 
                 data-id="<?= $c['id'] ?>" data-nombre="<?= $c['nombre'] ?>">
                
                <div class="card-visual <?= $color ?>">
                    <span style="filter: drop-shadow(0 5px 15px rgba(0,0,0,0.2))">👤</span>
                </div>

                <div class="card-info">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="client-name"><?= strtoupper($c['nombre']) ?></div>
                            <div class="text-muted small"><?= $c['direccion'] ?></div>
                        </div>
                        <button class="btn-action-sm">⚙️</button>
                    </div>
                    <div class="mt-3 pt-2 border-top border-secondary d-flex justify-content-between">
                         <span class="badge bg-dark border border-secondary">ID: #<?= $c['id'] ?></span>
                         <span class="text-<?= $c['deuda'] > 0 ? 'danger' : 'success' ?> fw-bold small">
                            <?= $c['deuda'] > 0 ? 'DEUDA' : 'AL DÍA' ?>
                         </span>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalCliente" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content border-0" style="background: #111; border-radius: 30px; border: 1px solid #333;">
            <div class="modal-body p-4">
                <h3 class="fw-bold mb-4 text-center" id="m-nombre">Cliente</h3>
                <div class="d-grid gap-3">
                    <a id="link-pedidos" href="#" class="btn btn-outline-light py-3 border-secondary rounded-4">📋 Ver Pedidos</a>
                    <a id="link-cuenta" href="#" class="btn btn-outline-light py-3 border-secondary rounded-4">💰 Estado de Cuenta</a>
                    <a id="link-nuevo" href="#" class="btn btn-primary py-3 fw-bold rounded-4 shadow-lg">🛒 NUEVO PEDIDO</a>
                    <button class="btn text-secondary mt-2" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Tu lógica de JS anterior se mantiene igual...
</script>
</body>
</html>