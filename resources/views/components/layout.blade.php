<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NBA Stats | {{ $title }}</title>

    @vite('resources/css/app.css')
</head>

<body>
    <h1>
        {{ $title }}
    </h1>

    @if ($errors->any())
        <div class="bg-red-300 text-white font-bold p-4 m-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
