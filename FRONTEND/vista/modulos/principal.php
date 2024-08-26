<section id="about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 section-opening-hours">
        <h6 class="section-subtitle">Horario de apertura</h6>
        <h3 class="section-title">Encuentranos de :</h3>
        <p class="mb-1 font-weight-bold">Lunes - Viernes : <span class="font-weight-normal pl-2 text-muted">10:00 am -
            10:00 pm</span></p>
        <p class="mb-1 font-weight-bold">Sabados - Domingos : <span class="font-weight-normal pl-2 text-muted">8:00 am -
            12:00 am</span></p>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col">
            <img src="vista/img/img-plantilla/salon1.jpg" class="w-100 rounded shadow">
          </div>
          <div class="col">
            <img src="vista/img/img-plantilla/salon2.jpg" class="w-100 rounded shadow">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Service Section -->
<section id="service" class="pattern-style-4 has-overlay">
  <div class="container raise-2">
    <h4 class="section-subtitle text-center">Nuestra carta</h4>

    <section class="container section-category">
      <div class="row">
        <?php
        $item = null;
        $valor = null;
        $categorias = ControladorCatPlatos::ctrMostrarCatPlatos($item, $valor);

        foreach ($categorias as $key => $value) :
          echo '<div class="col-sm-6 col-md-3 text-center">
            <div class="category-card">
              <img class="category-card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbR3IATt46jQws-6HXvDqSMFoGX9zmUagJGQ&s" alt="iamgen">
              <a href="' . $value["slug"] . '">
                <h4>' . $value["name"] . '</h4>
              </a>
            </div>
          </div>';
        endforeach;
        ?>
      </div>
    </section>
  </div>
</section>

<!-- Team Section -->
<section id="team">
  <div class="container">
    <h6 class="section-subtitle text-center">Nuesto equipo</h6>
    <h3 class="section-title mb-5 text-center">Chefs destacados</h3>
    <div class="row">
      <div class="col-md-4 my-3">
        <div class="team-wrapper text-center">
          <img src="vista/img/img-chef/chef-1.jpg" class="circle-120 rounded-circle mb-3 shadow"
            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
          <h5 class="my-3">Javier Santillán</h5>
          <p>Chef limeño que ha ganado fama por su enfoque en la cocina criolla contemporánea.</p>
          <h6 class="socials mt-3">
            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
          </h6>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="team-wrapper text-center">
          <img src="vista/img/img-chef/chef-2.jpg" class="circle-120 rounded-circle mb-3 shadow"
            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
          <h5 class="my-3">Renato Quispe</h5>
          <p>Chef limeño conocido por su pasión por los sabores marinos.</p>
          <h6 class="socials mt-3">
            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
          </h6>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="team-wrapper text-center">
          <img src="vista/img/img-chef/chef-3.jpg" class="circle-120 rounded-circle mb-3 shadow"
            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
          <h5 class="my-3">Pedro Rojas</h5>
          <p>Chef originario de Trujillo, conocido por su dedicación a la cocina norteña peruana.</p>
          <h6 class="socials mt-3">
            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
          </h6>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Testmonial Section -->
<section id="testmonial" class="pattern-style-3">
  <div class="container">
    <h6 class="section-subtitle text-center">Mejores clientes</h6>
    <h3 class="section-title mb-5 text-center">Reseñas</h3>

    <div class="row">
      <div class="col-md-4 my-3 my-md-0">
        <div class="card">
          <div class="card-body">
            <div class="media align-items-center mb-3">
              <img class="mr-3" src="vista/img/img-clientes/avatar-1.jpg"
                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
              <div class="media-body">
                <h6 class="mt-1 mb-0">Carla Muñoz</h6>
                <small class="text-muted mb-0">Ingeniera</small>
              </div>
            </div>
            <p class="mb-0">¡Qué experiencia tan increíble en Mar y Tierra! El cabrito con frijoles es
              simplemente espectacular, con un sabor auténtico que me transportó directamente al norte de Perú.
              El ambiente es acogedor y el servicio impecable. Sin duda, el Chef Pedro Rojas sabe cómo hacer
              brillar los ingredientes de su tierra natal. ¡Definitivamente regresaré!.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3 my-md-0">
        <div class="card">
          <div class="card-body">
            <div class="media align-items-center mb-3">
              <img class="mr-3" src="vista/img/img-clientes/avatar.jpg"
                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
              <div class="media-body">
                <h6 class="mt-1 mb-0">Jorge Fernández</h6>
                <small class="text-muted mb-0">Mecánico</small>
              </div>
            </div>
            <p class="mb-0">Mar y Tierra es sin duda un lugar que destaca en la escena culinaria.
              Fui con mi familia y todos quedamos encantados. Pedí el seco de cordero y me sorprendió
              lo bien que estaba cocinado, con un sabor profundo y una textura perfecta. El Chef Pedro
              Rojas realmente entiende cómo resaltar lo mejor de los ingredientes peruanos. Además,
              el servicio fue excelente y nos hicieron sentir como en casa. ¡Un restaurante al que seguro regresaré.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3 my-md-0">
        <div class="card">
          <div class="card-body">
            <div class="media align-items-center mb-3">
              <img class="mr-3" src="vista/img/img-clientes/avatar-2.jpg"
                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
              <div class="media-body">
                <h6 class="mt-1 mb-0">Luis Rodríguez</h6>
                <small class="text-muted mb-0">Electricista</small>
              </div>
            </div>
            <p class="mb-0">Soy un amante del ceviche y puedo decir sin dudarlo que el ceviche norteño de Mar y
              Tierra es uno de los mejores que he probado en mi vida. Los ingredientes son fresquísimos y
              la sazón es perfecta, con ese toque único que solo un chef como Pedro Rojas puede lograr. Además,
              la presentación de los platos es impecable. Un lugar altamente recomendable para disfrutar de la
              auténtica cocina norteña.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contact-wsp-container">
    <a href="https://wa.link/02wkot">
      <img src="https://img.icons8.com/?size=512&id=16713&format=png" alt="">
    </a>
  </div>
</section>

<!-- Page Footer -->
<footer class="border border-dark border-left-0 border-right-0 border-bottom-0 p-4 bg-dark">
  <div class="container">
    <div class="row align-items-center text-center text-md-left">
      <div class="col">
        <p class="mb-0 small">&copy; <script>
            document.write(new Date().getFullYear())
          </script>, <a href="https://www.facebook.com" target="_blank">Emanuel Mendoza Estrada</a> All rights reserved
        </p>
      </div>
      <div class="d-none d-md-block">
        <h6 class="small mb-0">
          <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
          <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
          <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
          <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
        </h6>
      </div>
    </div>
  </div>

</footer>