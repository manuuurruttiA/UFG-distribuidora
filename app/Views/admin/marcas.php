<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Marcas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0a0a0a; color: #fff; }
        .admin-card { background: #1a1a1a; border: 1px solid #333; border-radius: 15px; overflow: hidden; height: 100%; transition: 0.3s; }
        .admin-card:hover { border-color: #ff5722; }
        .btn-accent { background: #ff5722; color: white; border-radius: 10px; border: none; }
        .img-brand { width: 100%; height: 140px; object-fit: cover; border-bottom: 1px solid #333; }
    </style>
</head>
<body>

<nav class="p-3 border-bottom border-secondary mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="<?= base_url('/') ?>" class="text-white text-decoration-none">← Volver al Inicio</a>
        <h4 class="m-0 fw-bold">GESTIÓN DE MARCAS</h4>
        <button class="btn btn-accent fw-bold" data-bs-toggle="modal" data-bs-target="#modalNueva">+ Nueva Marca</button>
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php foreach ($categorias as $c): ?>
        <div class="col-6 col-md-3 mb-4">
            <div class="admin-card">
                <img src="<?= base_url('uploads/marcas/' . ($c['imagen'] ?: 'default_marca.png')) ?>" 
                     class="img-brand" 
                     onerror="this.src='<?= base_url('uploads/marcas/default_marca.png') ?>'">
                
                <div class="p-3 text-center">
                    <h5 class="m-0 fw-bold text-uppercase"><?= $c['nombre'] ?></h5>
                    <div class="d-flex gap-2 mt-3 justify-content-center">
                        <a href="<?= base_url('admin/productos/'.$c['id']) ?>" class="btn btn-outline-light btn-sm w-100">Productos</a>
                        <a href="<?= base_url('pedidos/borrar_categoria/'.$c['id'].'/0') ?>" 
                           class="btn btn-outline-danger btn-sm" 
                           onclick="return confirm('¿Borrar marca y todos sus productos?')">×</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalNueva" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-secondary text-white">
            <form action="<?= base_url('pedidos/guardar_categoria') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <h4 class="text-center mb-4">Nueva Marca</h4>
                    <input type="hidden" name="cliente_id" value="0"> 
                    
                    <div class="mb-3">
                        <label class="small text-secondary">Nombre de la Marca</label>
                        <input type="text" name="nombre_categoria" class="form-control bg-dark text-white border-secondary" placeholder="Ej: Hamburguesas" required>
                    </div>

                    <div class="mb-3">
                        <label class="small text-secondary">Foto de la Marca (Opcional)</label>
                        <input type="file" name="foto_categoria" class="form-control bg-dark text-white border-secondary" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-accent w-100 py-3 fw-bold">GUARDAR MARCA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>