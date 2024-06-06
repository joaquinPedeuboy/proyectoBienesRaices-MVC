document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
})

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto))
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){ // o podiramos poner solo un toggle en vez de contains, solo la agrega solo la quita
        navegacion.classList.remove('mostrar');
    }else {
        navegacion.classList.add('mostrar');
    }
}

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(prefiereDarkMode.matches);

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        }else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <label for="telefono">Numero Telefono</label>
        <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]">

        <p>Elija la fecha y la hora para la llamada</p>

        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="contacto[fecha]">

        <label for="hora">hora</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else {
        contactoDiv.innerHTML = `
        <label for="email">E-Mail</label>
        <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" >
        `;
    }
}