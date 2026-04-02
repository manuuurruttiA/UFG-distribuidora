<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - <?= $marca ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --bg-dark: #0a0a0a; --card-base: #1a1a1a; --accent: #ff5722; }
        body { background-color: var(--bg-dark); color: #fff; font-family: 'Segoe UI', sans-serif; }
        
        .product-card { 
            background: var(--card-base); border-radius: 15px; 
            border: 1px solid #333; padding: 1.5rem; margin-bottom: 1rem;
        }
        .qty-control {
            display: flex; align-items: center; gap: 15px;
            background: rgba(255,255,255,0.05); border-radius: 10px; padding: 5px 15px;
        }
        .btn-qty { 
            background: none; border: none; color: white; font-size: 1.5rem; font-weight: bold;
            width: 40px; height: 40px;
        }
        .btn-qty:active { color: var(--accent); }
    </style>
</head>
<body>

<nav class="p-3 border-bottom border-secondary d-flex justify-content-between align-items-center">
    <a href="<?= base_url('clientes/nuevo_pedido/'.$cliente_id) ?>" class="text-white text-decoration-none">← Marcas</a>
    <h4 class="m-0 fw-bold text-accent"><?= strtoupper($marca) ?></h4>
    <div style="width: 40px;"></div>
</nav>

<div class="container py-4">
    <div class="row g-3">
        <?php if(empty($productos)): ?>
            <div class="col-12 text-center text-muted">No hay productos disponibles para esta marca.</div>
        <?php else: ?>
            <?php foreach ($productos as $p): ?>
            <div class="col-12 col-md-6">
                <div class="product-card d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold m-0"><?= $p['nombre'] ?></h5>
                        <small class="text-success fw-bold">$<?= number_format($p['precio'], 2) ?></small>
                    </div>
                    
                    <div class="qty-control">
                        <button class="btn-qty" onclick="cambiarCant(<?= $p['id'] ?>, -1)">-</button>
                        <span id="qty-<?= $p['id'] ?>" class="fw-bold fs-5">0</span>
                        <button class="btn-qty" onclick="cambiarCant(<?= $p['id'] ?>, 1)">+</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="fixed-bottom p-3 bg-dark border-top border-secondary">
    <button class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow">
        CONTINUAR PEDIDO
    </button>
</div>

<script>
    function cambiarCant(id, val) {
        let el = document.getElementById('qty-' + id);
        let current = parseInt(el.innerText);
        let nuevo = current + val;
        if (nuevo >= 0) el.innerText = nuevo;
    }
</script>
</body>
</html>