var e;
function eliminar() {
  Swal.fire({
    title: "¿Seguro de la elimación?",
    text: "Ésta eliminación no es reversible",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar al usuario",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        "Eliminado!",
        "El usuario fue eliminado correctamente.",
        "success"
      ).then((result) => {
        if (result.isConfirmed) {
          let btnDelete = document.getElementById("btnDelete");
          let href = btnDelete.getAttribute("href");
          window.location.href = href;
        }
      });
    }
  });
}

function swalError(error) {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: error,
  });
}

function login(event) {
  let txtEmail = document.getElementById("txtEmail");
  let emailLength = txtEmail.value.length;
  let txtClave = document.getElementById("txtClave");
  let clavelLength = txtClave.value.length;
  if (emailLength < 6) {
    event.preventDefault();
    txtEmail.focus();
    swalError("El email es demaciado corto");
  } else if (clavelLength < 6) {
    txtClave.focus();
    event.preventDefault();
    swalError("La clave es demaciada corta");
  }
}

function verificarEmail() {
  $.ajax({
    async: false,
    url: "index.php",
    dataType: "json",
    method: "GET",
    data: {
      m: "verifyEmail",
      email: document.getElementById("txtEmail").value,
    },
    error: function (error) {
      console.log(error);
    },
    success: function (data) {
      if (data.status == "ocupado") {
        e.preventDefault();
        swalError("El email está ocupado");
      }
    },
  });
}

function validarForm(event, tipo) {
  let mod = true;
  e = event;
  if (tipo == "new") {
    verificarEmail();
    mod = false;
  }

  let txtNombre = document.getElementById("txtNombre");
  let nombreLength = txtNombre.value.length;
  let txtApellido = document.getElementById("txtApellido");
  let apellidoLength = txtApellido.value.length;
  let txtEmail = document.getElementById("txtEmail");
  let emailLength = txtEmail.value.length;
  let txtNacimiento = document.getElementById("txtNacimiento");
  let nacimientoLength = txtNacimiento.value.length;
  let txtClave = document.getElementById("txtClave");
  let claveLength = txtClave.value.length;
  let txtClave1 = document.getElementById("txtClave1");
  let clave1Length = txtClave1.value.length;

  if (nombreLength < 3) {
    txtNombre.focus();
    event.preventDefault();
    swalError("El nombre es demaciado corto");
  } else if (apellidoLength < 3) {
    txtApellido.focus();
    event.preventDefault();
    swalError("El apellido es demaciado corto");
  } else if (emailLength < 6) {
    txtEmail.focus();
    event.preventDefault();
    swalError("El email es demaciado corto");
  } else if (nacimientoLength == 0) {
    txtNacimiento.focus();
    event.preventDefault();
    swalError("Ingrese fecha de nacimiento");
  } else if (claveLength > 0 && claveLength < 6 && mod) {
    txtClave.focus();
    event.preventDefault();
    swalError("La contraseña debe tener un mínimo de 6 caracteres.");
  } else if (claveLength < 6 && !mod) {
    txtClave.focus();
    event.preventDefault();
    swalError("La contraseña debe tener un mínimo de 6 caracteres.");
  } else if (txtClave !== txtClave1 && !mod) {
    event.preventDefault();
    swalError("Las contraseñas no coinciden");
  } else if (mod && claveLength >= 6 && txtClave !== txtClave1) {
    event.preventDefault();
    swalError("Las contraseñas no coinciden");
  }
}
