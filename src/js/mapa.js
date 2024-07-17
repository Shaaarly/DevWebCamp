if (document.querySelector('#mapa')) {

    const lat = 39.475021954657784;
    const lng = -0.37662607461063924;
    const zoom = 16;


    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">DevWebCamp</h2>

            <p class="mapa__texto">Centro de convenciones de Valencia</p>
        `)
        .openPopup();
}