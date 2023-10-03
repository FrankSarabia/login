document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("registroForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();
      //console.log("hola");
      const formData = new FormData(this);

      fetch("../php/insertarRegistro.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.passwordIgual) {
            console.log(data.mensagePass);
            var div = document.getElementById("textoPasswords");
            div.hidden = true;

            if (data.usuarioExistente) {
              console.log(data.mensageUser);
              var div = document.getElementById("textoUsuario");
              div.hidden = false;

              if (data.emailExistente) {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = false;
              } else {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = true;
              }
            } else {
              console.log(data.mensageUser);
              var div = document.getElementById("textoUsuario");
              div.hidden = true;
              if (data.emailExistente) {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = false;
              } else {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = true;
                alert("Registro realizado con éxito");
                window.location.href = "../index.html";
              }
            }
          } else {
            console.log(data.mensagePass);
            var div = document.getElementById("textoPasswords");
            div.hidden = false;
            if (data.usuarioExistente) {
              console.log(data.mensageUser);
              var div = document.getElementById("textoUsuario");
              div.hidden = false;
              if (data.emailExistente) {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = false;
              } else {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = true;
              }
            } else {
              console.log(data.mensageUser);
              var div = document.getElementById("textoUsuario");
              div.hidden = true;
              if (data.emailExistente) {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = false;
              } else {
                console.log(data.mensageEmail);
                var div = document.getElementById("textoEmail");
                div.hidden = true;
              }
            }
          }
        });
    });
});
