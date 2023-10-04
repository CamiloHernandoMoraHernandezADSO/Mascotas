document.addEventListener("DOMContentLoaded", function() {
    const uploadInput = document.getElementById("upload");
    const fileStatus = document.getElementById("fileStatus");
    const nameRadio = document.querySelectorAll('input[type="radio"][name="imageRadio"]');
    
    if(document.getElementById("image2").style.display = "none"){
        document.getElementById("image2").style.display = "none";
    }
    nameRadio.forEach(item => {
        item.addEventListener('change', function(event) {
          // Obtener el valor del radio seleccionado
        const valorSeleccionado = event.target.value; 
        console.log(valorSeleccionado);
        if(valorSeleccionado == 'radio1'){
            document.getElementById("image1").style.display = "none";
            document.getElementById("image2").style.display = "none";
            document.getElementById("image1").style.display = "block";            
        }if(valorSeleccionado == 'radio2'){            
            document.getElementById("image1").style.display = "none";
            document.getElementById("image2").style.display = "none";
            document.getElementById("image2").style.display = "block";            
        }
        });
    });
    
    if (uploadInput) {
        uploadInput.addEventListener("input", function() {
            if (uploadInput.files.length > 0) {
                fileStatus.textContent = `Archivo seleccionado`;
            } else {
                fileStatus.textContent = "Ningún archivo seleccionado";
            }
        });
    }
    function toggleImage(valorSeleccionado) {
        // Oculta todas las imágenes
        document.getElementById("image1").style.display = "none";
        document.getElementById("image2").style.display = "none";

        // Muestra la imagen seleccionada
        document.getElementById("image" + imageNumber).style.display = "block";
    }

});
