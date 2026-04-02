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
            border: 1px solid #333; transition: 0.3s; cursor: pointer;
        }
        .brand-card:active { transform: scale(0.95); }
        .brand-visual { height: 120px; display: flex; align-items: center; justify-content: center; font-size: 3rem; }
        
        /* Colores Marcas */
        .bg-cyan { background: linear-gradient(45deg, #00dbde, #fc00ff); }
        .bg-pink { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .bg-purple { background: linear-gradient(45deg, #667eea, #764ba2); }
        .bg-orange { background: linear-gradient(45deg, #ff9a9e, #fecfef); }
        .bg-danger { background: linear-gradient(45deg, #ff0844, #ffb199); }

        .floating-cart {
            position: fixed; bottom: 20px; right: 20px; 
            background: var(--accent); color: white; padding: 15px 25px;
            border-radius: 50px; font-weight: bold; shadow: 0 10px 20px rgba(0,0,0,0.5);
            z-index: 1000; display: flex; align-items: center; gap: 10px;
        }
    </style>
</head>
<body>

<nav class="header-nav d-flex justify-content-between align-items-center">
    <a href="<?= base_url('clientes') ?>" class="text-white text-decoration-none">← Volver</a>
    <h5 class="m-0 fw-bold">NUEVO PEDIDO</h5>
    <div style="width: 50px;"></div>
</nav>

<div class="container py-4">
    <div class="text-center mb-5">
        <img src="<?= base_url('assets/images/logo_ufg.png') ?>" style="max-width: 150px;" class="mb-3">
        <h2 class="fw-bold">Selecciona una Marca</h2>
    </div>

    <div class="row g-3">
        <?php foreach ($marcas as $m): ?>
        <div class="col-6 col-md-4">
            <div class="brand-card shadow-lg text-center" onclick="seleccionarMarca('<?= $m['nombre'] ?>')">
                <div class="brand-visual <?= $m['color'] ?>">
                    <?= $m['icon'] ?>
                </div>
                <div class="p-3">
                    <h4 class="fw-bold m-0"><?= $m['nombre'] ?></h4>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="floating-cart shadow-lg">
    <span>🛒</span>
    <span>Ver Pedido ($0.00)</span>
</div>

<div class="modal fade" id="modalProductos" tabindex="-1">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-scrollable">
        <div class="modal-content border-0" style="background: #111; color: white;">
            <div class="modal-header border-secondary">
                <h5 class="modal-title fw-bold" id="tituloMarca">Marca</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="list-group list-group-flush">
                    <div class="list-group-item bg-transparent border-secondary p-3 text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0 fw-bold">Producto Ejemplo 1kg</h6>
                                <small class="text-success">$1,250.00</small>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-sm btn-outline-light">-</button>
                                <span class="fw-bold">0</span>
                                <button class="btn btn-sm btn-primary">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-primary w-100 py-3 fw-bold" data-bs-dismiss="modal">LISTO</button>
            </div>
        </div>
    </div>
</div>

<script>
    function seleccionarMarca(nombre) {
    const clienteId = "<?= $cliente_id ?>";
    const baseUrl = "<?= base_url() ?>";
    
    // 1. Convertimos a Base64
    // 2. Reemplazamos los '=' por nada para que la URL sea 100% limpia
    let nombreCodificado = btoa(nombre).replace(/=/g, ""); 
    
    window.location.href = baseUrl + "/pedidos/productos/" + clienteId + "/" + nombreCodificado;
}
</script>
</body>
</html>