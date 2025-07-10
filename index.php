<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Invitación de Boda</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="icon" href="source/icons/anillos.ico" type="image/x-icon">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div id="loader" class="loader">
  <p>Cargando...</p>
</div>
<div id="carta-modal">
  <div class="carta-container" id="contenedor_video">
    <!-- <img id="carta-imagen" src="img/carta_2.png" alt="Carta animada" /> -->
     <video id="carta-video" width="300" poster="img/carta_2.jpg" preload="auto" muted
  playsinline
  webkit-playsinline >
      <source src="img/carta_vid.mp4" type="video/mp4">
      Tu navegador no soporta video HTML5.
    </video>
  </div>
</div>

<div id="contenido-principal" class="contenido_principal animate__delay-2s" style="display: none;"> 
  <!-- Portada -->
  <section class="portada">
    <div class="contenido-portada">
      <!-- <img src="img/anillos.png" class="anillos" alt="Anillos" /> -->
      <!-- <h1>Nuestro amor, en el tiempo perfecto</h1>
      <p>No necesitamos una eternidad para saberlo… con un instante fue suficiente para entender que queríamos pasarla juntos. 💍</p> -->
    </div>
  </section>

  <!-- Presentación -->
  <section class="presentacion">
    <div class="custom-audio-player controlador">
      <h2 class="titulo-audio"> DALE PLAY A NUESTRO <br> COMIENZO </h2>
      <button id="btnPlayPause" class="btn btn-outline-danger animate-on-scroll animate__slower animate__infinite" data-animate="animate__heartBeat">
        <img id="imgAudio" src="source/icons/pause.svg" alt="Pausa" width="40" height="40">
      </button>
      <h2 class="titulo-audio"> CON ESTA CANCIÓN ESPECIAL </h2>
      <!-- <span id="statusAudio" style="margin-left: 10px;">Reproduciendo...</span> -->
    </div>
    <div class="nombre_presentacion animate-on-scroll animate__slower" data-animate="">
      <h1>SAMANTHA & ALBERTO</h1>
    </div>
    <div class="audio-player">
      <audio class="musica" id="musica_boda" controls preload="auto" loop>
        <source src="source/music/musica_v2.mp3" type="audio/mpeg">
          Tu navegador no soporta el audio HTML5.
      </audio>
    </div>
  </section>

  <section class="primera_foto">
    <div>
      <h2 class="titulo_roboto animate-on-scroll animate__slower" data-animate="animate__bounceInRight">¡NOS CASAMOS!</h2>
      <h2 class="descripcion_roboto">Nos encantaría que seas parte de este momento tan especial para nosotros</h2>
    </div>
  </section>
  <section class="seccion_calendario">
    <h2>¡SOLO FALTAN!</h2>
    <div id="contador" class="contador">
      <div class="bloque">
        <div id="dias" class="valor">00</div>
        <div class="etiqueta">DÍAS</div>
      </div>
      <div class="bloque">
        <div id="dias" class="valor">:</div>
        <div class="etiqueta"> </div>
      </div>
      <div class="bloque">
        <div id="horas" class="valor">00</div>
        <div class="etiqueta">HORAS</div>
      </div>
      <div class="bloque">
        <div id="horas" class="valor">:</div>
        <div class="etiqueta"> </div>
      </div>
      <div class="bloque">
        <div id="minutos" class="valor">00</div>
        <div class="etiqueta">MINUTOS</div>
      </div>
      <div class="bloque">
        <div id="minutos" class="valor">:</div>
        <div class="etiqueta"> </div>
      </div>
      <div class="bloque">
        <div id="segundos" class="valor">00</div>
        <div class="etiqueta">SEGUNDOS</div>
      </div>
    </div>
  </section>

  <!-- Carrusel -->
  <section class="carrusel bg-white py-5 text-center">
      <!-- <h2 class="mb-4" style="color: #da6e6e;">Nuestros Recuerdos</h2> -->

      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_1.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_2.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_3.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_4.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_5.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_6.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_7.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_8.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_9.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="img/foto_10.jpeg" alt="Foto 1" class="img-fluid rounded-4 shadow" />
                </div>
                <div class="flip-card-back">
                  <p>Nuestra primera cita ❤️</p>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- Evento Civil -->
  <section class="lugar_evento">
    <div class="tarjeta_ubicacion">
      <div class="filtro"></div> <!-- filtro negro encima del fondo -->
      <div class="contenido_tarjeta">
        <img id="imgAudio" src="source/icons/icono_tarjeta.svg" alt="Pausa" width="40" height="40" color="white">
        <h2>Boda Civil</h2>
        <p><strong>Ubicación:</strong> Casa KOKAY</p>
        <p class="link_ubicacion"><a href="https://www.google.com/maps?q=584J+24+Casa+Kokay,+97334+San+Ignacio,+Yuc.&ftid=0x8f55df0014ff1969:0x65abeee0a4a3f87e&entry=gps&lucs=,94274536,94275316,94224825,94227247,94227248,94231188,47071704,47069508,94218641,94203019,47084304&g_ep=CAISEjI1LjI0LjEuNzY5MjczNTU2MBgAIIgnKmMsOTQyNzQ1MzYsOTQyNzUzMTYsOTQyMjQ4MjUsOTQyMjcyNDcsOTQyMjcyNDgsOTQyMzExODgsNDcwNzE3MDQsNDcwNjk1MDgsOTQyMTg2NDEsOTQyMDMwMTksNDcwODQzMDRCAk1Y&skid=e209c23a-0bf3-424c-a9af-b80726d5dfde&g_st=iw" target="_blank">Ver en Google Maps</a></p>
        <p><strong>Inicio de ceremonia:</strong> 05:30 PM</p>
      </div>
    </div>
  </section>
  <section class="codigo_vestimenta">
    <h2 class="titulo_roboto">CÓDIGO DE VESTIMENTA</h2>
    <h2 class="descripcion_sermo">Formal</h2>
    <ul class="listado_vestimenta">
      <li class="vestimenta_hombre">Hombre: Traje sin necesidad de corbata (aunque es aceptada).</li>
      <li class="vestimenta_mujer">Mujer: Vestido corto o midi elegante.</li>
    </ul>
  </section>
  <section class="confirmacion">
    <strong class="titulo_roboto" id="nombre_invitado"></strong>
    <div class="titulo_sermo" id="personas_permitidas"></div>
    <button id="btn_confirmar">Confirmar Asistencia</button>
  </section>
  <section class="mesa_regalos">
    <div class="mesa_contenido">
      <strong>Agradecemos de corazón su cariño, compañía y generosidad. Su presencia es el mejor regalo, pero si desean obsequiarnos algo más, será recibido con mucho amor y gratitud.</strong>
      <a href="https://mesaderegalos.liverpool.com.mx/milistaderegalos/51713908" class="btn_regalo" target="_blank">
        <img src="source/icons/mesa_regalo.png" alt="Ir a la mesa de regalos" />
        Ver mesa de regalos
      </a>
    </div>
  </section>
  <section class="coleccion_fotos">
    <div class="tarjeta_fotos">
      <strong>¡Comparte tus recuerdos con nosotros!</strong>
      <a href="https://drive.google.com/drive/folders/1MChmynaZeZTfB4Bl0yH1_27-2nIO2HEm" class="btn_drive" target="_blank">
        <img src="source/icons/icono_subir.png" alt="Subir fotos al Drive" />
        Subir fotos
      </a>
    </div>
  </section>
  <section class="Listado_comentarios">
    <strong class="titulo_roboto titulo_lista">DEJA TUS BUENOS DESEOS</strong>
    <div class="formulario">
      <div class="primera_parte">
        <label for="nombre">Nombre del Remitente:</label>
        <input type="text" name="nombre" id="nombre_invitado">
      </div>
      <div class="segunda_parte">
        <label for="mensaje">Mensaje del Remitente</label>
        <textarea name="mensaje" id="mensaje" placeholder="Mis mejores deseos..."></textarea>
      </div>
      <input type="button" value="Enviar Mensaje" id="boton_enviar" class="btn-enviar">
    </div>
    <div class="lista">
      <strong for="">Listado de mensajes</strong>
      <ul class="listado" id="enlistado">

      </ul>
    </div>
  </section>
</div>

   <!-- 1. Carga la librería -->
  <script src="https://cdn.jsdelivr.net/npm/amplitudejs@5.3.2/dist/amplitude.min.js"></script>
  <!-- 3. Resto de librerías -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 2. Tu código -->
    <script type="module" src="js/index.js"></script>
</body>
</html>
