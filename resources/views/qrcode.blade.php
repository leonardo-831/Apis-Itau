<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ItauAPI-QrCodePix</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>
        <h1><strong>Dados do PIX</strong></h1>
        <p><strong>Valor:</strong> R$ {{ $valor }}</p>
        <p><strong>Nome do Devedor:</strong> {{ $nomeDevedor }}</p>
        <p><strong>CNPJ do Devedor:</strong> {{ $cnpjDevedor }}</p>
        <br>
        <h2><strong>QR Code</strong></h2>
        {!! $qrCode !!}
        <br>
        <p><strong>Pix Copia e Cola:</strong> {{ $pixCopiaECola }}</p>
    </div>
</body>

</html>
