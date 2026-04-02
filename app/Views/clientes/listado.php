<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-xl { padding: 1.5rem; font-size: 1.2rem; border-radius: 15px; }
        .list-group-item { cursor: pointer; border-left: 5px solid transparent; transition: 0.2s; }
        .list-group-item:active { background-color: #f0f0f0; border-left: 5px solid #0d6efd; }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold m-0">Clientes</h2>
        <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">Volver</a>
    </div>

    <input type="text" id="busqueda" class="form-control form-control-lg mb-3 shadow-sm" placeholder="Buscar cliente...">

    <div class="list-group shadow-sm">
        <?php foreach ($clientes as $c): ?>
            <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalCliente" 
                    data-id="<?= $c['id'] ?>" 
                    data-nombre="<?= $c['nombre'] ?>">
                <div>
                    <div class="fw-bold fs-5"><?= $c['nombre'] ?></div>
                    <small class="text-muted"><?= $c['direccion'] ?></small>
                </div>
                <span class="badge <?= $c['deuda'] > 0 ? 'bg-danger' : 'bg-success' ?> rounded-pill">
                    <?= $c['deuda'] > 0 ? '$'.$c['deuda'] : 'Al día' ?>
                </span>
            </button>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalCliente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 25px;">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold" id="m-nombre">Cliente</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-grid gap-3">
                    <a id="link-pedidos" href="#" class="btn btn-light btn-xl text-start shadow-sm border">
                        📦 Historial de Pedidos
                    </a>
                    <a id="link-cuenta" href="#" class="btn btn-light btn-xl text-start shadow-sm border">
                        💳 Historial de Cuenta
                    </a>
                    <a id="link-nuevo" href="#" class="btn btn-success btn-xl text-start shadow-sm fw-bold">
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