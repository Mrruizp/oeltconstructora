

$("#frmgrabar").submit(function (event) {
    event.preventDefault();


                    

                    $.post(
                            "../controlador/sesion.validar.controller.php",
                            {
                                p_usuario: $("#usuario").val(),
                                p_clave: $("#password").val()
                            }
                    ).done(function (resultado) {
                     //   var datosJSON = resultado;

                       // if (datosJSON.datos === "SI") {
                        //    location.href = "../view/resultadoSimulador.view.php?id";
                       // } else {
                            switch (resultado.datos) 
                            {
                                case "CI":
                                    swal("Contraseña incorrecta", "vuelva a ingresar contraseña", "error");
                                    break;

                                case "IN":
                                    swal("Usuario inactivo incorrecta", "Consulte con su administrador", "error");
                                    break;

                                case "NE":
                                    swal("Usuario no existe", "vuelva a ingresar usuario", "error");
                                    break;

                                default: //SI
                                
                                location.href = "../vista/inicio.admin.php";
                                swal("Iniciando Sesión", "", "success");
                                
                                break;
                            }
                        //}

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

                
           

});



