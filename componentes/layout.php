<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Proyecto LSV' ?></title>

    <script src="/plsv/public/lib/browser@4.js"></script>


    <style type="text/tailwindcss">
        @font-face {
      font-family: "Montserrat";
      src: url("/plsv/public/fonts/Montserrat.ttf") format("truetype-variations");
      font-weight: 100 900;
      font-style: normal;
    }

    @theme {
      --font-sans: "Montserrat", sans-serif;
    }

    @utility button {
     @apply  border-2 border-blue-800 inline-flex items-center justify-center -translate-y-1 hover:translate-y-0 active:translate-y-0 transition-transform text-nowrap px-4 py-2 uppercase font-bold rounded-2xl;
    }

    @utility button-wrapper {
      @apply bg-blue-800 w-fit rounded-2xl;
    }

    @utility input {
         @apply border-2 rounded-2xl border-gray-400 font-bold bg-gray-200 inline-flex items-center px-4 py-2 text-gray-800;
    }
    </style>

</head>

<body class="w-full h-svh font-montserrat flex flex-col overflow-hidden">

    <?php require __DIR__ . '/header.php'; ?>

    <main class="w-full h-full flex flex-col">
        <?= $content ?? '' ?>
    </main>

    <?php require __DIR__ . '/footer.php'; ?>

</body>

</html>