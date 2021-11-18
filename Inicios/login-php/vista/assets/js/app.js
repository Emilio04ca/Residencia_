$(document).ready(function() {

    $("#loginForm").bind("submit", function() {

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm button[type=submit]").html("enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Administraidor encontrado, te estamos redirigiendo...",
                        callback: function() {
                             window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/admi_menu.php";
                        }
                    });
                }
                else{ 
                    if (response.estado == "trues") {
                    $("body").overhang({
                        type: "success",
                        message: "Alumno encontrado, te estamos redirigiendo...",
                        callback: function() {
                            window.location.href = 'http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_SIIE/inicio_menu.php';
                            
                            
                        }
                    });
                }
                else {
                    if (response.estado == "falso") {
                    $("body").overhang({
                        type: "error",
                        message: "por favor! introduce datos"
                    });
                }
            }

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
                
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrecto!",
                        callback: function() {
                            window.location.href = 'http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php';
                            
                            
                        }
                });

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });

        return false;
    });

});