function openDescription(newsId) {
    var modal = document.getElementById('modal');
    var titleElement = document.getElementById('modal-title');
    var descriptionElement = document.getElementById('modal-description');
    var newsData = {
        'news1': { 'judul': 'Judul Berita 1', 'deskripsi': 'Deskripsi lengkap berita 1...' },
        'news2': { 'judul': 'Judul Berita 2', 'deskripsi': 'Deskripsi lengkap berita 2...' }
    };
    titleElement.textContent = newsData[newsId].judul;
    descriptionElement.textContent = newsData[newsId].deskripsi;

    modal.style.display = 'block';
}
