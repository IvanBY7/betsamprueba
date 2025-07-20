import { UrlBase, Url } from "./config.js";
// const UrlBase = "http://192.168.1.217:8000/backend/";

let btn = null
let status = null
let audio = null
let swiper = null
let video = null
let modal = null
let contenido = null
let imgAudio = null
let div_nombre_invitado = null
let div_personas_permitidas = null
let btn_confirmar = null;
let btn_declinar = null;
let id_familia = null;
let mensajes = [
  {id: 1, nombre: "Maribel", mensaje: "Mensaje de prueba"},
  {id: 2, nombre: "Ivan", mensaje: "Otra prueba de mensaje"},
  {id: 3, nombre: "Samantha", mensaje: "Probanding"},
  {id: 4, nombre: "Alberto", mensaje: "ultimo elemento por defecto"},
]

let input_nombre = null;
let input_mensaje = null;

const familia = {
  id: null,
  nombre_familia: "",
  confirmacion_asistencia: false,
  particpa_foto: false,
}

document.addEventListener("DOMContentLoaded", async function () {
  const loader = document.getElementById('loader');
  div_nombre_invitado = document.getElementById('nombre_invitado_confirmacion');
  div_personas_permitidas = document.getElementById('personas_permitidas');
    btn_confirmar = document.getElementById('btn_confirmar');
    btn_declinar = document.getElementById('btn_declinar');
  btn_confirmar.addEventListener('click', confirmarAsistencia)
  btn_declinar.addEventListener('click', declinarAsistencia)

  await loadFamilia()
  
  await loadMensajes()
  input_nombre = document.getElementById('nombre_invitado')
  input_mensaje = document.getElementById('mensaje')

  document.getElementById('boton_enviar').addEventListener('click', enviarmensaje)
  // Fecha límite (por ejemplo: 25 de julio de 2025 a las 15:00)
  document.getElementById('contenedor_video').addEventListener('click', prueba)
  
  btn = document.getElementById('btnPlayPause');
  status = document.getElementById('statusAudio');
  audio = document.getElementById('musica_boda');
  imgAudio = document.getElementById('imgAudio');
  Amplitude.init({
    songs: [
      {
        name: "Música de Boda",
        url: Url+"source/music/musica_v2.mp3"
      }
    ]
  });
  swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
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
    // card.addEventListener('click', () => {
    //   card.classList.toggle('flipped');
    // });
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

  loader.style.display = 'none';

});
function enviarmensaje() {
  const nombre = input_nombre.value.trim();
  const mensaje = input_mensaje.value.trim();

  if (!nombre || !mensaje) {
    alert("Por favor, completa ambos campos.");
    return;
  }

  fetch(UrlBase + 'postMensajes.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams({
      nombre: nombre,
      mensaje: mensaje
    })
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Error en la respuesta del servidor');
    }
    return response.json();
  })
  .then(data => {
    if (data.success) {
      input_nombre.value = '';
      input_mensaje.value = '';
      loadMensajes(); // Recargar mensajes
    } else {
      console.error('Error del servidor:', data.error);
      alert('No se pudo enviar el mensaje.');
    }
  })
  .catch(error => {
    console.error('Error en la petición:', error);
    alert('Error al intentar enviar el mensaje.');
  });
}


async function loadMensajes() {
  await fetch(UrlBase+'getMensajes.php')
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la respuesta del servidor');
      }
      return response.json();
    })
    .then(data => {
      if (data.success) {
        renderizarMensajes(data.data); // Renderiza los mensajes recibidos
      } else {
        console.error('Error desde el servidor:', data.error);
      }
    })
    .catch(error => {
      console.error('Error en la petición:', error);
    });
}


function renderizarMensajes(mensajes) {
  const lista = document.getElementById('enlistado');
  lista.innerHTML = ''; // Limpiar contenido previo

  mensajes.forEach(msg => {
    const li = document.createElement('li');
    li.classList.add('mensaje-item');

    li.innerHTML = `
      <strong>${msg.nombre}</strong>
      <p>${msg.mensaje}</p>
    `;

    lista.appendChild(li);
  });
}
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
async function loadFamilia() {
  const params = new URLSearchParams(window.location.search);
  const familiaBase64 = params.get('familia');
  if(!familiaBase64) {
    btn_confirmar.textContent = "¡No se reconoce ninguna familia!"
    btn_confirmar.disabled = true;
    return
  }
  const familiaDecodificada = atob(familiaBase64);
  const familia = familiaDecodificada;
  id_familia = familia
  console.log(familia)

  try {
    const response = await fetch(UrlBase + 'getFamilia.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({
        id_familia: familia
      })
    });

    if (!response.ok) {
      throw new Error('Error en la respuesta del servidor');
    }

    const data = await response.json();

    if (data.success) {
      console.log(data)
      render_info_familia(data.data)
      //renderizarMensajes(data.
      // data); // o cualquier función que maneje la info
    } else {
      console.error('Error desde el servidor:', data.error);
    }
  } catch (error) {
    console.error('Error en la petición:', error);
  }
}
function render_info_familia(familia){
  const strong_confirmar = document.getElementById('strong_confirmar')
  const strong_declinar = document.getElementById('strong_declinar')
  var mensaje_personas = familia.personas_permitidas + " Personas permitidas"
  if(familia.personas_permitidas == "1") mensaje_personas = familia.personas_permitidas + " Persona permitida"
  div_nombre_invitado.textContent = familia.nombre_familia
  div_personas_permitidas.textContent = mensaje_personas
  strong_declinar.textContent = "Lo siento, no podré asistir 😔"
  if(familia.confirmacion_asistencia){
    strong_confirmar.textContent = "¡Gracias por haber confirmado tu asistencia!"
    btn_confirmar.disabled = true;
    btn_declinar.style.display = 'none'
  } 
  else {
    strong_confirmar.textContent = "¡Con gusto asistiré en este momento tan especial! ❤️"
    btn_declinar.style.display = 'block'
    btn_confirmar.disabled = false;
  }
}

// Confirmación
async function confirmarAsistencia() {
  const familia = {
      id_familia:id_familia
    };

    try {
      const response = await fetch(UrlBase + 'ConfirmarAsistencia.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(familia)
      });

      const result = await response.json();

      if (result.success) {
        alert("¡Gracias por confirmar tu asistencia! ❤️ \n Se te dirigirá a WhatsApp \n ¡No olvides regresar para ver el resto de la invitación!");
        btn_confirmar.textContent = "¡Gracias por haber confirmado tu asistencia!"
        btn_confirmar.disabled = true;
        btn_declinar.style.display = 'none'
        enviarMensajeWhatsApp("¡Hola! Quiero confirmar mi asistencia a la boda. 💍✨")
        //document.getElementById('listado-tab').click(); // volver al tab de listado
      } else {
        console.log(result)
        alert('No se pudo confirmar tu asistencia, por favor comunicate conmigo por WhatsApp');
      }

    } catch (error) {
      console.log('Error en la solicitud: ' + error.message);
    }
  
}

function declinarAsistencia(){
  enviarMensajeWhatsApp(`¡Hola! Muchas gracias por la invitación, me siento muy honrad@ de ser considerado@ para un momento tan especial 💍✨.

Lamentablemente no podré asistir, pero les deseo lo mejor en esta nueva etapa llena de amor y felicidad ❤️.

¡Que disfruten muchísimo su día y que sea inolvidable! 🎉`)
}

function enviarMensajeWhatsApp(mensaje) {
  const numero = '529991412116'; // Reemplaza con el número real, sin "+" ni espacios
  const url = `https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`;
  window.open(url, '_blank');
}
