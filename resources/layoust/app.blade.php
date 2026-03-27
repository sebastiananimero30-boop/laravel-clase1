{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>@yield('title', 'Gestión de Estudiantes')</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px;
               margin: 0 auto; padding: 20px; background: #f5f5f5; }
        table { width:100%; border-collapse:collapse; background:white; }
        th, td { padding:10px; text-align:left;
                 border-bottom:1px solid #ddd; }
        th { background:#006633; color:white; }
        .btn { padding:8px 14px; border:none; border-radius:4px;
               cursor:pointer; text-decoration:none;
               display:inline-block; font-size:14px; }
        .btn-primary  { background:#1565C0; color:white; }
        .btn-warning  { background:#F57F17; color:white; }
        .btn-danger   { background:#C62828; color:white; }
        .btn-success  { background:#006633; color:white; }
        .alert { padding:12px; margin:10px 0; border-radius:4px;
                 background:#E8F5E9; border-left:4px solid #006633; }
        input, select { width:100%; padding:8px; margin:6px 0;
                        border:1px solid #ccc; border-radius:4px;
                        box-sizing:border-box; }
        .error { color:#C62828; font-size:13px; }
        h1 { color:#004225; }
    </style>
</head>
<body>
    <h1>🎓 Gestión de Estudiantes — SENA</h1>
    <hr>
    @if(session('success'))
        <div class='alert'>{{ session('success') }}</div>
    @endif
    @yield('content')
</body>
</html>
