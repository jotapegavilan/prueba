function eliminar(){    
    Swal.fire({
    title: '¿Seguro de la elimación?',
    text: "Ésta eliminación no es reversible",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar al usuario'
    }).then((result) => {
    if (result.isConfirmed) {        
        Swal.fire(
        'Eliminado!',
        'El usuario fue eliminado correctamente.',
        'success'
        ).then((result) => {
            if(result.isConfirmed){
                let btnDelete = document.getElementById('btnDelete');
        let href = btnDelete.getAttribute('href');
        window.location.href = href;
            }
        });
        
    }
    })
}

function swalError(error){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: error
    })
}

function verificarEmail(event){
    
    $.ajax({
        url: 'index.php',
        dataType: 'json',
        method : 'GET',
        data : {
            m : 'verifyEmail',
            email : document.getElementById("txtEmail").value
        },
        error: function(error){
            console.log(error);
        },
        success: function(data) {
            console.log(data);
          if( data.status == 'ocupado' ){
            event.preventDefault();  
            swalError("El email está ocupado");
          }          
        }
      });
     
}

function validarForm(event,tipo){
    console.log("creando");
    let mod = true;
    if(tipo!='mod'){
        verificarEmail(event);
        mod = false;
    }
    

    
    
    let txtNombre = document.getElementById("txtNombre").value;
    let txtApellido = document.getElementById("txtApellido").value;
    let txtEmail = document.getElementById("txtEmail").value;
    let txtNacimiento = document.getElementById("txtNacimiento").value;
    let txtClave = document.getElementById("txtClave").value;
    let txtClave1 = document.getElementById("txtClave1").value;
    
    
    if( txtNombre.length < 3 ){
        event.preventDefault();        
        swalError("El nombre es demaciado corto");
    }else if(txtApellido.length < 3){
        event.preventDefault();        
        swalError("El apellido es demaciado corto");
    }else if(txtEmail.length < 6){
        event.preventDefault();        
        swalError("El email es demaciado corto");
    }
    else if(txtNacimiento.length == 0){
        event.preventDefault();        
        swalError("Ingrese fecha de nacimiento");
    }else if(txtClave.length >0 && txtClave.length <6 && mod){
        event.preventDefault();        
        swalError("La contraseña debe tener un mínimo de 6 caracteres.");
    }
    else if(txtClave.length < 6 && !mod){
        event.preventDefault();        
        swalError("La contraseña debe tener un mínimo de 6 caracteres.");
    }else if(txtClave !== txtClave1 && !mod){
        event.preventDefault();        
        swalError("Las contraseñas no coinciden");
    }else if(mod && txtClave.length >= 6 && txtClave !== txtClave1){
        event.preventDefault();        
        swalError("Las contraseñas no coinciden");
    }

    
}