<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - Nuevo Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --bg-dark: #0a0a0a; --card-base: #1a1a1a; --accent: #ff5722; }
        body { background-color: var(--bg-dark); color: #fff; font-family: 'Segoe UI', sans-serif; }
        .header-nav { padding: 1.5rem; background: rgba(255,255,255,0.02); border-bottom: 1px solid #333; }
        
        .brand-card { 
            background: var(--card-base); border-radius: 20px; overflow: hidden; 
            border: 1px solid #333; transition: 0.3s; cursor: pointer; min-height: 180px;
        }
        .brand-card:active { transform: scale(0.95); }
        .brand-visual { height: 100px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; }
        
        .bg-cyan { background: linear-gradient(45deg, #00dbde, #fc00ff); }
        .bg-pink { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .bg-purple { background: linear-gradient(45deg, #667eea, #764ba2); }
        .bg-orange { background: linear-gradient(45deg, #ff9a9e, #fecfef); }
        .bg-danger { background: linear-gradient(45deg, #ff0844, #ffb199); }
    </style>
</head>
<body>

<nav class="header-nav d-flex justify-content-between align-items-center">
    <a href="<?= base_url('clientes') ?>" class="text-white text-decoration-none">← Clientes</a>
    <h5 class="m-0 fw-bold">SELECCIONAR MARCA</h5>
    <div style="width: 50px;"></div>
</nav>

<div class="container py-4">
    <div class="row g-3">
        <?php foreach ($categorias as $c): ?>
        <div class="col-6 col-md-4">
            <div class="brand-card shadow-lg text-center" onclick="seleccionarCategoria('<?= $c['nombre'] ?>')">
                <div class="brand-visual <?= $c['color'] ?>"><?= $c['icono'] ?></div>
                <div class="p-3">
                    <h6 class="fw-bold m-0"><?= $c['nombre'] ?></h6>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function seleccionarCategoria(id) { // Ahora recibe el ID
    const clienteId = "<?= $cliente_id ?>";
    const baseUrl = "<?= base_url() ?>";
    // Codificamos el ID en base64 para mantener tu lógica de URLs
    let idEncoded = btoa(id).replace(/=/g, "");
    window.location.href = baseUrl + "/pedidos/productos/" + clienteId + "/" + idEncoded;
}
</script>

</body>
</html>