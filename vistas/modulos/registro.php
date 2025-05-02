
<div class="container-fluid">
		
		<div class="container py-5">

            <div class="d-flex justify-content-center text-center py-3">

                <form class="p-5 bg-light" method="post">
            
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
            
                            <input type="text" class="form-control" id="nombre" name="registroNombre">
            
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="nombre">Teléfono:</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
            
                            <input type="text" class="form-control" id="telefono" name="registroTelefono">
            
                        </div>
                        
                    </div>
            
                    <div class="form-group">
            
                        <label for="email">Correo electrónico:</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
            
                            <input type="email" class="form-control" id="email" name="registroCorreo">
                        
                        </div>
                        
                    </div>
            
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
            
                            <input type="password" class="form-control" id="pwd" name="registroClave">
            
                        </div>
            
                    </div>

                <?php

                    /*=============================================
                    FORMA EN QUE SE INSTA­NCIA LA CLASE DE UN MÉTODO ESTÁTICO
                    =============================================*/

                    $registro = ControladorRegistro::ctrRegistro();

                    if ($registro === 'ok') {
                        // Aquí sí entra cuando el método devuelve "ok"
                        echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                        echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                    }

                ?>
                
                    <button type="submit" class="btn btn-primary">Enviar</button>
            
                </form>
            
            </div>

        </div>

    </div>