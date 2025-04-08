// Toggle menu (opsional, bisa dikembangkan)
document.getElementById('menu-icon').onclick = function () {
    document.querySelector('.nav-links').classList.toggle('active');
  };
  
  // Tombol Submit
  document.querySelector('.contact .visit-btn').onclick = function () {
    alert('Pesan kamu telah dikirim!');
  };
  