<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Marca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0a0a0a; color: #fff; }
        .brand-card { background: #1a1a1a; border-radius: 20px; overflow: hidden; border: 1px solid #333; }
        .brand-img { height: 120px; width: 100%; object-fit: cover; }
    </style>
</head>
<body>

<nav class="p-3 border-bottom border-secondary mb-4 d-flex justify-content-between align-items-center">
    <a href="<?= base_url('clientes') ?>" class="text-white text-decoration-none">← Clientes</a>
    <h5 class="m-0 fw-bold">MARCAS</h5>
    <div style="width: 50px;"></div>
</nav>

<div class="container">
    <div class="row g-3">
        <?php foreach ($categorias as $c): ?>
        <div class="col-6 col-md-4" onclick="seleccionarCategoria('<?= $c['id'] ?>')">
            <div class="brand-card shadow-lg text-center">
                <img src="<?= base_url('uploads/marcas/'.($c['imagen'] ?? 'default_marca.png')) ?>" class="brand-img">
                <div class="p-3"><h6 class="fw-bold m-0 text-uppercase"><?= $c['nombre'] ?></h6></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function seleccionarCategoria(id) {
    let idEncoded = btoa(id).replace(/=/g, "");
    window.location.href = "<?= base_url('pedidos/productos/'.$cliente_id) ?>/" + idEncoded;
}
</script>
</body>
</html>