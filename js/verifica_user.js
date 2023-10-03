document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // Obtén los datos del formulario
    const formData = new FormData(this);
    //console.log("Hola");

    // Realiza la solicitud AJAX
    fetch("../login/php/verificar_user.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        //alert("Acceso concedido");
        if (data.authenticated) {
          // Redirige a la página de hola de usuario
          window.location.href = "/../login/html/hola.html";
          //alert('Usuario autenticado')
        } else {
          // Muestra un mensaje de error al usuario
          var div = document.getElementById("errorUserPassVerification");
          div.hidden = false;
        }
      })
      .catch((error) => {
        console.error("Error con la respuesta:", error);
      });
  });
});
