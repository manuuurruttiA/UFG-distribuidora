<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Marcas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0a0a0a; color: #fff; }
        .admin-card { background: #1a1a1a; border: 1px solid #333; border-radius: 15px; transition: 0.3s; }
        .admin-card:hover { border-color: #ff5722; background: #222; }
        .table-dark { --bs-table-bg: #1a1a1a; border: 1px solid #333; }
        .btn-accent { background: #ff5722; color: white; border-radius: 10px; }
    </style>
</head>
<body>

<nav class="p-3 border-bottom border-secondary mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="<?= base_url('/') ?>" class="text-white text-decoration-none">← Volver al Inicio</a>
        <h4 class="m-0 fw-bold">PANEL LOGÍSTICA</h4>
        <button class="btn btn-accent btn-sm" data-bs-toggle="modal" data-bs-target="#modalNueva"> + Nueva Marca</button>
    </div>
</nav>

<div class="container">
    <h3 class="fw-bold mb-4">Gestión de Marcas</h3>
    
    <div class="row g-3">
        <?php foreach ($categorias as $c): ?>
        <div class="col-md-4">
            <div class="admin-card p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="m-0 fw-bold"><?= $c['nombre'] ?></h5>
                    <small class="text-secondary">Gestionar productos y precios</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('admin/productos/'.$c['id']) ?>" class="btn btn-outline-light btn-sm">Ver</a>
                    <a href="<?= base_url('pedidos/borrar_categoria/'.$c['id'].'/0') ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Borrar marca?')">×</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalNueva" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-secondary">
            <form action="<?= base_url('pedidos/guardar_categoria') ?>" method="POST">
                <div class="modal-body p-4">
                    <h4 class="text-center mb-4">Nueva Marca / Rubro</h4>
                    <input type="hidden" name="cliente_id" value="0"> <input type="text" name="nombre_categoria" class="form-control bg-dark text-white border-secondary py-3" placeholder="Nombre (ej: Helados)" required>
                    <button type="submit" class="btn btn-accent w-100 mt-3 py-3 fw-bold">CREAR MARCA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>