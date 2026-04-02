<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UFG - Distribuidora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .logo-container { padding: 40px 0; text-align: center; }
        .logo-img { max-width: 250px; height: auto; } /* Ajusta el tamaño según tu logo */
        .card-clientes { 
            border: none; 
            border-radius: 20px; 
            transition: transform 0.2s; 
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
        }
        .card-clientes:active { transform: scale(0.98); }
        .btn-xl { padding: 1.5rem; font-size: 1.3rem; border-radius: 15px; }
    </style>
</head>
<body>

<div class="container-fluid min-vh-100 d-flex flex-column">
    
    <div class="logo-container mb-4">
        <img src="<?= base_url('/images/logo_ufg.png') ?>" alt="Urutia Food Group Logo" class="logo-img shadow-sm p-3 bg-white rounded">
        <h1 class="mt-3 fw-bold text-dark" style="font-size: 1.5rem;">UFG Distribuidora</h1>
        <p class="text-muted">Sistema de Gestión Local</p>
    </div>

    <div class="row justify-content-center mt-auto mb-auto">
        <div class="col-11 col-md-8 col-lg-6">
            <a href="<?= base_url('clientes') ?>" class="text-decoration-none">
                <div class="card card-clientes p-5 text-center shadow">
                    <div class="card-body">
                        <span class="fs-1 d-block mb-3">👥</span>
                        <h2 class="card-title fw-bold text-primary mb-3" style="font-size: 2.2rem;">GESTIÓN DE CLIENTES</h2>
                        <p class="card-text text-secondary fs-5">Listado, pedidos, cuentas corrientes y más.</p>
                        <div class="d-grid mt-4">
                            <span class="btn btn-primary btn-xl fw-bold">Entrar →</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <footer class="text-center py-4 text-muted mt-auto">
        &copy; <?= date('Y') ?> Urutia Food Group
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>