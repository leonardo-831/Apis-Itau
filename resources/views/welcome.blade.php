<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ItauAPI-teste</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function updateFormAction() {
            var form = document.getElementById('paymentForm');
            var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            if (paymentMethod === 'pix') {
                form.action = "{{ route('payment.pix') }}";
            }
        }
    </script>
</head>

<body class="antialiased">
    <div class="h-[100vh] flex justify-center items-center ">
        <form id="paymentForm" method="post" class="w-[700px]">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Nome
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Digite seu nome" name="nome">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        CPF
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Digite seu CPF" name="cpf">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Valor
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Valor" name="valor">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Descrição
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Descrição" name="descricao">
                </div>
            </div>
            <textarea class="border border-gray-300 w-full rounded-[10px] min-h-[300px] p-4" placeholder="enter token"
                name="token" id="token"></textarea>
            <button class="bg-blue-500 px-10 py-[12px] rounded-[10px] text-white mt-2 mr-2">teste</button>
            <input type="radio" name="payment_method" value="pix" onclick="updateFormAction()">Pix
            <input class="ml-2" type="radio" name="payment_method" value="boleto"
                onclick="updateFormAction()">Boleto
        </form>
    </div>
</body>

</html>
