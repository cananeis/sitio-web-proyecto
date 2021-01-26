function cambio_archivo() {
    var archivo = document.getElementById('fileToUpload').files[0];
    var img = document.getElementById('img');

    var lectorArchivo = new FileReader();
    lectorArchivo.onload = function () {
        img.src = this.result
    }
    lectorArchivo.readAsDataURL(archivo);
}

function cambio_fotos(){
    
    var archivos = document.getElementById('fotukis').files;
    if(archivos.length>0){
        console.log(archivos);
        var file;
        var etiquetas = "";
        for (var i = 0; i < archivos.length; i++) {

            file = archivos[i];

            var lectorArchivo = new FileReader();

            lectorArchivo.onload = function () {
                etiquetas= etiquetas+"<img src="+this.result+"> <br>";
                //console.log(this.result);
                //alert("SI ENTRO A LA FUNCION!!!");
                //console.log("a ver entro a la funcion");
                //etiquetas= "a ver entro a la funcion";
                document.getElementById('fotos').innerHTML=etiquetas;
            }
            lectorArchivo.readAsDataURL(file);
            //alert(file.name);
        }
    }
}

function cerrarSesion() {
    $.ajax({
        //Tipo de envio
        type: "POST",
        //URL destino
        url: "./controlador/controlador_usuario.php",
        //Datos a enviar
        data: 'cerrar',

        success: function () {
            //Coloca el resultado en la pagina WEB
            window.location.replace("http://localhost/index.php");
        },
    });
}