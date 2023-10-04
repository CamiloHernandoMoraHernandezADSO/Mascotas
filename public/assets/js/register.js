//Url base del proyecto
const url = "http://localhost/mascotas";
//Atributos del formulario
const email = document.getElementById("email");
let usuario = document.getElementById("first_name");

let form = document.getElementById("form");
let btn = document.getElementById("btnRegistrar");
const formActive = true;
//Función validar correo electronico
const validarEmail = (email) => {
  // Validamos que el campo tenga solo un @  y un punto
  // el @ no puede ser el primer caracter del correo
  // y el punto debe ir posicionando al menos un carácter después de la @
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
};

const enviarFormulario = (form) => {
  form.submit();
};

//Función para solicitar datos al servidor
const validacion = async (e) => {
  //Validamos que el campo correo este lleno
  if (email.value != "") {
    //Validamos que el formato del correo sea valido
    if (validarEmail(email.value)) {
      //Los datos que enviaremos al controlador
      const data = {
        email: email.value,
      };
      //Codificamos los datos
      const request_data = JSON.stringify(data);
      console.log(request_data);
      console.log(email.value);
      try {
        //Realizamos el envio a la ruta del controlador
        let ajax = await fetch(url + "/register/email", {
          method: "POST",
          body: request_data,
        });
        console.log(ajax);
        //Respuesta servidor
        let json = await ajax.json();

        console.log(json["exist"]);

        if (json["exist"]) {
          btn.disabled = true;
        }
        else{
            btn.disabled = false;
        }

        //console.log(json.data);
        //Validamos el codigo de respuesta
        if (json.data) {
          alert("El correo ya esta registrado");
          console.log(json.data, "Error");
          formActive = false;
        } else {
          alert("El correo no esta registrado");
          console.log(json.data, "Error");
        }
      } catch (err) {
        let message = err.statusText || "Ocurrio un error";
        console.log(message);
        console.error(err);
      } finally {
      }
    } else {
      alert("Por favor, escribe un correo electrónico válido");
    }
  }
};

//Eventos del formulario
email.addEventListener("blur", validacion);
//usuario.addEventListener('blur', validacion2)
btn.addEventListener("click", enviarFormulario);