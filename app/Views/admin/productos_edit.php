<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Productos - <?= $categoria['nombre'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0a0a0a; color: #fff; }
        .table-dark { --bs-table-bg: #1a1a1a; border: 1px solid #333; }
        .btn-accent { background: #ff5722; color: white; }
    </style>
</head>
<body>

<nav class="p-3 border-bottom border-secondary mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="<?= base_url('admin') ?>" class="text-white text-decoration-none">← Volver a Marcas</a>
        <h4 class="m-0 fw-bold">Productos: <?= $categoria['nombre'] ?></h4>
        <button class="btn btn-accent fw-bold" data-bs-toggle="modal" data-bs-target="#modalNuevo"> + Nuevo </button>
    </div>
</nav>

<div class="container">
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Unidad</th>
                <th>Costo</th>
                <th>Margen (%)</th>
                <th class="text-warning">Precio Venta</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= $p['nombre'] ?></td>
                <td><?= $p['unidad'] ?></td>
                <td>$<?= number_format($p['precio_compra'], 2) ?></td>
                <td><?= $p['margen_ganancia'] ?>%</td>
                <td class="fw-bold text-warning">$<?= number_format($p['precio_venta'], 2) ?></td>
                <td>
                    <a href="<?= base_url('admin/borrar_producto/'.$p['id']) ?>" class="btn btn-sm btn-outline-danger">×</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalNuevo" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-secondary">
            <form action="<?= base_url('admin/guardar_producto') ?>" method="POST">
                <div class="modal-body p-4">
                    <h4 class="text-center mb-4">Nuevo Producto</h4>
                    <input type="hidden" name="categoria_id" value="<?= $categoria['id'] ?>">
                    
                    <input type="text" name="nombre" class="form-control bg-dark text-white border-secondary mb-3" placeholder="Nombre del producto" required>
                    <input type="text" name="unidad" class="form-control bg-dark text-white border-secondary mb-3" placeholder="Unidad (un, kg, pack)" value="un.">
                    
                    <div class="row">
                        <div class="col-6">
                            <label class="small text-secondary">Costo Compra</label>
                            <input type="number" step="0.01" name="precio_compra" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-6">
                            <label class="small text-secondary">% Ganancia</label>
                            <input type="number" name="margen_ganancia" class="form-control bg-dark text-white border-secondary" value="30">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-accent w-100 mt-4 py-2 fw-bold">GUARDAR PRODUCTO</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>