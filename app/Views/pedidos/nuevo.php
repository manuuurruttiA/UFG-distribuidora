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
        
        /* Tarjetas de Categoría */
        .brand-card { 
            background: var(--card-base); border-radius: 20px; overflow: hidden; 
            border: 1px solid #333; transition: 0.3s; cursor: pointer; min-height: 180px;
        }
        .brand-card:active { transform: scale(0.95); }
        .brand-visual { height: 100px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; }
        
        /* Tarjeta Agregar */
        .add-category-card {
            background: transparent; border: 2px dashed rgba(255,255,255,0.15); border-radius: 20px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            cursor: pointer; min-height: 180px; transition: 0.3s;
        }
        .add-category-card:hover { border-color: var(--accent); background: rgba(255,87,34,0.05); }

        /* Degradados para las categorías */
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
    <h5 class="m-0 fw-bold">NUEVO PEDIDO</h5>
    <div style="width: 50px;"></div>
</nav>

<div class="container py-4">
    <div class="row g-3">
        <?php foreach ($categorias as $c): ?>
        <div class="col-6 col-md-4">
            <div class="brand-card shadow-lg text-center" onclick="seleccionarCategoria('<?= $c['nombre'] ?>')">
                <div class="brand-visual <?= $c['color'] ?>"><?= $c['icono'] ?></div>
                <div class="p-3"><h6 class="fw-bold m-0"><?= $c['nombre'] ?></h6></div>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="col-6 col-md-4">
            <div class="add-category-card" data-bs-toggle="modal" data-bs-target="#modalNueva">
                <div class="display-6 text-secondary">+</div>
                <div class="small text-secondary fw-bold">Nueva Categoría</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNueva" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content border-0" style="background: #111; border-radius: 25px; border: 1px solid #333;">
            <form action="<?= base_url('pedidos/guardar_categoria') ?>" method="POST">
                <div class="modal-body p-4 text-center">
                    <h4 class="fw-bold mb-3 text-white">Nuevo Rubro</h4>
                    
                    <input type="hidden" name="cliente_id" value="<?= $cliente_id ?>">
                    
                    <input type="text" name="nombre_categoria" class="form-control bg-dark border-secondary text-white py-3 mb-3" placeholder="Nombre (ej: Postres)" required>
                    
                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">GUARDAR CATEGORÍA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function seleccionarCategoria(nombre) {
        const clienteId = "<?= $cliente_id ?>";
        const baseUrl = "<?= base_url() ?>";
        
        // Codificamos en Base64 y limpiamos caracteres prohibidos por CodeIgniter
        let slug = btoa(nombre).replace(/=/g, "");
        
        window.location.href = baseUrl + "/pedidos/productos/" + clienteId + "/" + slug;
    }
</script>

</body>
</html>