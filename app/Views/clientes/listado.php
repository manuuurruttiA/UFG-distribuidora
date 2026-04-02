<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - Clientes Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-base: #1a1a1a;
        }

        body {
            background-color: var(--bg-dark);
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            padding-bottom: 50px;
        }

        /* Header con Logo */
        .header-ufg {
            padding: 2rem 0;
            background: linear-gradient(to bottom, rgba(255,87,34,0.1), transparent);
        }

        .logo-small { max-width: 120px; }

        /* Buscador Estilizado */
        .search-container {
            max-width: 600px;
            margin: 0 auto 3rem auto;
        }
        .form-control-dark {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            color: white;
            padding: 12px 20px;
        }
        .form-control-dark:focus {
            background: rgba(255,255,255,0.1);
            color: white;
            border-color: #ff5722;
            box-shadow: none;
        }

        /* Grid de Tarjetas */
        .client-card {
            background: var(--card-base);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255,255,255,0.05);
            height: 100%;
        }

        .client-card:hover {
            transform: translateY(-10px);
        }

        /* Cabecera de Color de la Tarjeta */
        .card-visual {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            position: relative;
        }

        /* Cuerpo de la Tarjeta */
        .card-info {
            padding: 1.5rem;
            background: var(--card-base);
        }

        .client-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .client-meta {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        /* Botones de Acción Estilo Iconos */
        .action-btns {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-action {
            background: rgba(255,255,255,0.05);
            border: none;
            color: #aaa;
            padding: 8px 12px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-action:hover {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        /* Colores dinámicos para las tarjetas */
        .bg-cyan { background: #1abc9c; }
        .bg-pink { background: #e91e63; }
        .bg-purple { background: #9c27b0; }
        .bg-orange { background: #ff5722; }
    </style>
</head>
<body>

<header class="header-ufg text-center">
    <div class="container">
        <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/images/logo_ufg.png') ?>" alt="UFG Logo" class="logo-small mb-3">
        </a>
        <h1 class="fw-bold">Listado de Clientes</h1>
    </div>
</header>

<div class="container">
    <div class="search-container">
        <input type="text" class="form-control form-control-dark" placeholder="Filtrar por nombre, zona o deuda...">
    </div>

    <div class="row g-4">
        <?php 
        $colores = ['bg-cyan', 'bg-pink', 'bg-purple', 'bg-orange'];
        foreach ($clientes as $index => $c): 
            $color = $colores[$index % count($colores)];
        ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="client-card shadow-lg" data-bs-toggle="modal" data-bs-target="#modalCliente" 
                 data-id="<?= $c['id'] ?>" data-nombre="<?= $c['nombre'] ?>">
                
                <div class="card-visual <?= $color ?>">
                    <span class="shadow-sm">🏢</span>
                </div>

                <div class="card-info d-flex justify-content-between align-items-center">
                    <div>
                        <div class="client-name"><?= $c['nombre'] ?></div>
                        <div class="client-meta"><?= $c['direccion'] ?></div>
                    </div>
                    <div class="action-btns">
                        <button class="btn-action">ℹ️</button>
                        <button class="btn-action">🔗</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalCliente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 25px; background: #1a1a1a; color: white;">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold" id="m-nombre">Cliente</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-grid gap-3">
                    <a id="link-pedidos" href="#" class="btn btn-dark py-3 text-start border-secondary">
                        📦 Historial de Pedidos
                    </a>
                    <a id="link-cuenta" href="#" class="btn btn-dark py-3 text-start border-secondary">
                        💳 Historial de Cuenta
                    </a>
                    <a id="link-nuevo" href="#" class="btn btn-success py-3 text-start fw-bold">
                        🛒 REALIZAR NUEVO PEDIDO
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const modal = document.getElementById('modalCliente');
    modal.addEventListener('show.bs.modal', e => {
        const b = e.relatedTarget;
        const id = b.getAttribute('data-id');
        const nombre = b.getAttribute('data-nombre');
        document.getElementById('m-nombre').textContent = nombre;
        document.getElementById('link-pedidos').href = "<?= base_url('clientes/historial_pedidos/') ?>" + id;
        document.getElementById('link-cuenta').href = "<?= base_url('clientes/historial_cuenta/') ?>" + id;
        document.getElementById('link-nuevo').href = "<?= base_url('clientes/nuevo_pedido/') ?>" + id;
    });
</script>
</body>
</html>