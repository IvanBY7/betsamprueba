let btn = null
let status = null
let audio = null
let swiper = null
let video = null
let modal = null
let contenido = null
let imgAudio = null

document.addEventListener("DOMContentLoaded", function () {
  btn = document.getElementById('btnPlayPause');
  status = document.getElementById('statusAudio');
  audio = document.getElementById('musica_boda');
  imgAudio = document.getElementById('imgAudio');
  Amplitude.init({
    songs: [
      {
        name: "Música de Boda",
        url: "http://192.168.1.217:443/BETSAM/front/source/music/musica_v2.mp3"
      }
    ]
  });
  swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });

  // Agrega comportamiento de voltear al hacer clic
  document.querySelectorAll('.flip-card').forEach(card => {
    card.addEventListener('click', () => {
      card.classList.toggle('flipped');
    });
  });
  video = document.getElementById("carta-video");
  modal = document.getElementById("carta-modal");
  contenido = document.getElementById("contenido-principal");

  window.addEventListener('click', function activarMusica() {
    
    //audio.play().catch(err => console.log("Reproducción bloqueada:", err));
    // Solo la primera vez
    //window.removeEventListener('click', activarMusica);
  });

  
  btn.addEventListener('click', () => {
    try{
      //alert(audio.paused)
      if (audio.paused) {
        audio.play();
        imgAudio.src = 'source/icons/pause.svg';
        //status.innerText = 'Reproduciendo...';
      } else {
        audio.pause();
        imgAudio.src = 'source/icons/play.svg';
        //status.innerText = 'Música detenida';
      }
    }catch(ex){
      alert(ex)
    }
  });

  // Fecha límite (por ejemplo: 25 de julio de 2025 a las 15:00)
  const fechaLimite = new Date("2025-09-20T17:30:00").getTime();

  const diasElem = document.getElementById("dias");
  const horasElem = document.getElementById("horas");
  const minutosElem = document.getElementById("minutos");
  const segundosElem = document.getElementById("segundos");

  const intervalo = setInterval(() => {
    const ahora = new Date().getTime();
    const diferencia = fechaLimite - ahora;

    if (diferencia <= 0) {
      clearInterval(intervalo);
      diasElem.textContent = "00";
      horasElem.textContent = "00";
      minutosElem.textContent = "00";
      segundosElem.textContent = "00";
      return;
    }

    const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
    const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    diasElem.textContent = String(dias).padStart(2, '0');
    horasElem.textContent = String(horas).padStart(2, '0');
    minutosElem.textContent = String(minutos).padStart(2, '0');
    segundosElem.textContent = String(segundos).padStart(2, '0');
  }, 1000);

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const animation = entry.target.getAttribute('data-animate') || 'animate__fadeIn';
        entry.target.classList.add('animate__animated', animation);
        entry.target.style.opacity = 1;
        //observer.unobserve(entry.target); // Elimínalo si quieres repetir
      }
    });
  }, {
    threshold: 0.5
  });

  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
  });

});
function prueba(){
    audio.play().catch(err => alert("Audio bloqueado:", err));
    video.play();
    setTimeout(() => {
      modal.classList.add("ocultar");
      setTimeout(() => {
        modal.style.display = "none";
        contenido.style.display = "flex";
        
      }, 400);
    }, 1400)
  }


// Confirmación
function confirmarAsistencia() {
  alert("¡Gracias por confirmar tu asistencia! ❤️");
}
