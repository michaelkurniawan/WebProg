<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kainara Team</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
  <style>
    .fade-out {
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .fjalla {
      font-family: 'Fjalla One', serif;
      color: #895129
    }
  </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">
    <div id="opening" class="border-2 border-amber-500 flex items-center justify-center h-screen transition-opacity duration-1000">
        <div class="border-2 border-red-600 flex flex-col items-start text-left relative">
            <p class="border-2 border-blue-500 text-base text-gray-600 tracking-widest">WE ARE</p>
            <h1 class="border-2 border-black text-9xl font-bold tracking-widest fjalla m-2">KAINARA</h1>
            <div class="border-2 border-blue-500 flex justify-end items-end w-full">
                <p class="text-base text-gray-600 tracking-widest">BANGGA PAKAI KARYA UMKM</p>
            </div>
        </div>
    </div>


    <div id="mainContent" class="hidden flex-1 flex items-center justify-center">
        <h2 class="text-3xl font-semibold text-gray-700">Welcome to Kainara Team Website</h2>
    </div>


    <script>
        setTimeout(() => {
        const opening = document.getElementById('opening');
        const main = document.getElementById('mainContent');

        opening.classList.add('fade-out');
        setTimeout(() => {
            opening.classList.add('hidden');
            main.classList.remove('hidden');
        }, 1000);
        }, 3000);
    </script>

</body>
</html>
