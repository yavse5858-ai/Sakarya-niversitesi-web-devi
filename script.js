// --- 1. BÖLÜM: FİLM ARAMA ---
const API_KEY = 'b13245cc';

async function filmAra() {
    const inputField = document.getElementById('filmAraInput');
    const resultContainer = document.getElementById('film-listesi');
    const query = inputField.value.trim();

    if (!query) {
        alert("Lütfen bir film ismi giriniz.");
        return;
    }

    resultContainer.innerHTML = '<div class="text-center w-100"><div class="spinner-border text-primary"></div></div>';

    try {
        const response = await fetch(`https://www.omdbapi.com/?s=${query}&apikey=${API_KEY}`);
        const data = await response.json();

        if (data.Response === "True") {
            let html = '';
            data.Search.forEach(item => {
                const img = (item.Poster !== 'N/A') ? item.Poster : 'https://via.placeholder.com/300x450?text=No+Image';
                html += `
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="${img}" class="card-img-top p-2" style="height: 350px; object-fit: cover; border-radius: 15px;">
                            <div class="card-body text-center">
                                <h6 class="card-title fw-bold">${item.Title}</h6>
                                <p class="badge bg-secondary">${item.Year}</p>
                            </div>
                        </div>
                    </div>`;
            });
            resultContainer.innerHTML = html;
        } else {
            resultContainer.innerHTML = `<div class="alert alert-warning w-100 text-center">Sonuç bulunamadı: ${data.Error}</div>`;
        }
    } catch (error) {
        console.error("Sistem Hatası:", error);
    }
}

// --- 2. BÖLÜM: İLETİŞİM FORMU DENETİM ---

// Native JS fonksiyonu
function validateWithJS() {
    const ad = document.getElementById('adSoyad').value.trim();
    const mail = document.getElementById('email').value.trim();
    const tel = document.getElementById('telefon').value.trim();

    if (ad === "" || mail === "" || tel === "") {
        alert("Sistem Uyarısı: Lütfen tüm alanları doldurunuz.");
        return false;
    }
    
    if (!mail.includes("@")) {
        alert("Geçersiz e-posta!");
        return false;
    }

    alert("Native JS Denetimi Başarılı! Form gönderiliyor.");
    document.getElementById('iletisimFormu').submit();
}

// Vue.js Bölümü
const { createApp } = Vue;
const app = createApp({
    methods: {
        validateWithVue() {
            const ad = document.getElementById('adSoyad').value.trim();
            const mail = document.getElementById('email').value.trim();

            if (!ad || !mail) {
                alert("Vue.js: Eksik alan var!");
            } else {
                alert("Vue.js Denetimi Başarılı!");
                document.getElementById('iletisimFormu').submit();
            }
        }
    }
});

// Vue sadece iletişim sayfasında çalışsın diye kontrol ekliyoruz
if (document.getElementById('iletisimFormu')) {
    app.mount('#iletisimFormu');
}