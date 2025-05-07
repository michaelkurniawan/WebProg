<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kainara Team</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: 'Raleway', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <div id="app" class="flex-grow">
    <!-- Main page or member detail page will be rendered here -->
  </div>

  <script>
    const members = [
      {
        id: 1,
        name: "Angelina Joyvina Christy Setyawan",
        nim: "2702363733",
        kelas: "PPTI 18",
        img: "/img/nana/1.jpg",
        alt: "Angelina Joyvina",
      },
      {
        id: 2,
        name: "Arya Maulana Shodiqi",
        nim: "2702363746",
        kelas: "PPTI 18",
        img: "/img/arya/tes.JPG",
        alt: "Arya Maulana Shodiqi",
      },
      {
        id: 3,
        name: "Fransiska Fu",
        nim: "2702363891",
        kelas: "PPTI 18",
        img: "/img/siska/1.JPG",
        alt: "Fransiska Fu",
      },
      {
        id: 4,
        name: "Michael Kurniawan",
        nim: "2702363992",
        kelas: "PPTI 18",
        img: "/img/michael/1.JPG",
        alt: "Michael Kurniawan",
      },
      {
        id: 5,
        name: "Yosua Sugihartono",
        nim: "2702364276",
        kelas: "PPTI 18",
        img: "/img/yos/1.JPG",
        alt: "Yosua Sugihartono",
      },
    ];

    const app = document.getElementById("app");

    function renderMainPage() {
      app.innerHTML = `
        <header class="bg-white shadow p-6 mb-8">
          <h1 class="text-3xl font-semibold text-center text-gray-800">Kainara Team</h1>
        </header>
        <main class="max-w-6xl mx-auto px-4">
          <div class="grid place-items-center justify-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            ${members
              .map((member) => {
                const shortName = member.name.split(" ").slice(0, 2).join(" ");
                return `
                  <div class="bg-white rounded-lg shadow hover:shadow-lg cursor-pointer transition-shadow duration-300 flex flex-col items-center p-4 text-center"
                    data-id="${member.id}" tabindex="0" role="button" aria-pressed="false" aria-label="View details of ${member.name}">
                    <img src="${member.img}" alt="${member.alt}" class="w-40 h-40 object-cover rounded-full mb-4" />
                    <h2 class="text-lg font-semibold text-gray-900">${shortName}</h2>
                    <p class="text-gray-600">NIM: ${member.nim}</p>
                  </div>
                `;
              })
              .join("")}
          </div>
        </main>
      `;

      const cards = app.querySelectorAll("[data-id]");
      cards.forEach((card) => {
        card.addEventListener("click", () => {
          const id = card.getAttribute("data-id");
          renderMemberPage(Number(id));
        });
        card.addEventListener("keydown", (e) => {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            const id = card.getAttribute("data-id");
            renderMemberPage(Number(id));
          }
        });
      });
    }

    function renderMemberPage(memberId) {
      const member = members.find((m) => m.id === memberId);
      if (!member) {
        renderMainPage();
        return;
      }
      document.title = `Detail Anggota - ${member.name}`;
      app.innerHTML = `
        <header class="bg-white shadow p-6 mb-8 flex items-center justify-between max-w-6xl mx-auto px-4">
          <h1 class="text-2xl font-semibold text-gray-800">Detail Anggota: ${member.name}</h1>
          <button id="backBtn" aria-label="Kembali ke halaman utama" class="text-blue-600 hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 rounded">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
          </button>
        </header>
        <main class="max-w-6xl mx-auto px-4">
          <section class="mb-12 flex flex-col items-center text-center">
            <img src="${member.img}" alt="${member.alt}" class="w-48 h-48 object-cover rounded-full mb-6 shadow-lg" />
            <h2 class="text-3xl font-bold text-gray-900 mb-2">${member.name}</h2>
            <p class="text-gray-700 text-lg mb-1">NIM: ${member.nim}</p>
            <p class="text-gray-700 text-lg">Kelas: ${member.kelas}</p>
          </section>
          <section>
            <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Anggota Kelompok Lainnya</h3>
            <div class="grid place-items-center justify-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
              ${members
                .map((m) => {
                  const shortName = m.name.split(" ").slice(0, 2).join(" ");
                  return `
                    <div class="bg-white rounded-lg shadow hover:shadow-lg cursor-pointer transition-shadow duration-300 flex flex-col items-center p-4 text-center"
                      data-id="${m.id}" tabindex="0" role="button" aria-pressed="false" aria-label="View details of ${m.name}">
                      <img src="${m.img}" alt="${m.alt}" class="w-32 h-32 object-cover rounded-full mb-4" />
                      <h4 class="text-md font-semibold text-gray-900">${shortName}</h4>
                      <p class="text-gray-600 text-sm">NIM: ${m.nim}</p>
                      <p class="text-gray-600 text-sm">Kelas: ${m.kelas}</p>
                    </div>
                  `;
                })
                .join("")}
            </div>
          </section>
        </main>
      `;

      document.getElementById("backBtn").addEventListener("click", () => {
        renderMainPage();
      });

      const cards = app.querySelectorAll("section:nth-child(2) [data-id]");
      cards.forEach((card) => {
        card.addEventListener("click", () => {
          const id = card.getAttribute("data-id");
          renderMemberPage(Number(id));
        });
        card.addEventListener("keydown", (e) => {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            const id = card.getAttribute("data-id");
            renderMemberPage(Number(id));
          }
        });
      });
    }

    renderMainPage();
  </script>
</body>
</html>
