<section class="container">

    <div class="crear-formulario">
        <h1 class="center">Informacion personal</h1>

        <!--Inicio formulario configuracion perfil-->

        <fieldset>

            <!--Datos Personales-->

            <div class="contenedorDatosEditar ">

                <legend class="centrado">Datos Personales
                    <div class="expandirDatosPersonales">
                        <img src="../../public/img/utilidades/expandir.png" alt="expandir informacion" style="height:'3rem'; width: 3rem">
                    </div>
                </legend>

                <div class="datosPersonales">
                    <label for="documento">
                        <h4><b>Documento de Identidad: </b>
                            <h4 id="doc" class="padding-left-1"></h4>
                    </label>
                    <label for="nombre">
                        <h4><b>Nombre(s):</b>
                            <h4 id="nombre" class="padding-left-1"></h4>
                    </label>
                    <label for="apellido">
                        <h4><b>Apellido(s):</b>
                            <h4 id="apellido" class="padding-left-1"></h4>
                    </label>
                    <label for="genero">
                        <h4><b>Genero:</b>
                            <h4 id="genero" class="padding-left-1"></h4>
                    </label>

                    <div class="btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEditarDatosPerfil">Editar</button>
                    </div>
                </div>


                <!--Datos de Contacto-->


                <form id="formEditarDatos">
                    <!-- Modal -->
                    <div class="modal fade" id="ModalEditarDatosPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <!--quitar modal dialog daniel-->
                        <div class="modal-dialog modal-dialog-centered " role="document">
                            <div class="modal-backdrio-transparent"></div>

                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="container">
                                        <div class="row">

                                            <div class="col-2 alinear">
                                                <label for="documento">
                                                    <h4><b>Documento: </b>
                                                </label>
                                            </div>

                                            <div class="col-2 alinear">
                                                <input type="text" name="modal_doc" id="modal_doc">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-2">
                                                <label for="nombre">
                                                    <h4><b>Nombre(s):</b>
                                                </label>
                                            </div>
                                            <div class="col-2 alinear">
                                                <input type="text" name="modal_nombre" id="modal_nombre">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-2">
                                                <label for="apellido">
                                                    <h4><b>Apellido(s):</b>
                                                </label>
                                            </div>
                                            <div class="col-2 alinear">
                                                <input type="text" name="modal_apellido" id="modal_apellido">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-2 alinear">
                                                <label for="genero">
                                                    <h4><b>Genero:</b>
                                                </label>
                                            </div>
                                            <div class="col-2 alinear">
                                                <input type="text" name="modal_genero" id="modal_genero">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btnEditarDatos">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

            </div><!--Fin div-->
            </form>
            <!--Fin de Datos Personales-->





            <div class="contenedorDatosEditar">


                <legend class="centrado">Datos De Contacto

                    <div class="expandirDatosContacto">
                        <img src="../../public/img/utilidades/expandir.png" alt="expandir informacion" style="height:'3rem'; width: 3rem">
                    </div>
                </legend>

                <div class="datosContacto">

                    <label for="correo">
                        <h4><b>Correo:</b>
                            <h4 id="email" class="padding-left-1"></h4>
                    </label>
                    <label for="telefono">
                        <h4><b>Telefono:</b>
                            <h4 id="tel" class="padding-left-1"></h4>
                    </label>
                    <label for="direccion">
                        <h4><b>Direccion:</b>
                            <h4 id="direccion" class="padding-left-1"></h4>
                    </label>

                    <div class="btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarContacto">Editar</button>
                    </div>

                </div>
            </div><!--Fin div-->

            <form id="formEditarContacto">
                <!-- Modal -->
                <div class="modal fade" id="modalEditarContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <!--quitar modal dialog daniel-->
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-backdrio-transparent"></div>

                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="container">
                                    <div class="row d-none">

                                        <div class="col-2 alinear">
                                            <label for="documento">
                                                <h4><b>Documento: </b>
                                            </label>
                                        </div>

                                        <div class="col-2 alinear">
                                            <input type="text" name="modal_doc_1" id="modal_doc_1">
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-2 alinear">
                                            <label for="correo">
                                                <h4><b>Correo: </b>
                                            </label>
                                        </div>

                                        <div class="col-2 alinear">
                                            <input type="text" name="modal_correo" id="modal_correo">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-2">
                                            <label for="tel">
                                                <h4><b>Telefono :</b>
                                            </label>
                                        </div>
                                        <div class="col-2 alinear">
                                            <input type="text" name="modal_tel" id="modal_tel">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2">
                                            <label for="direccion">
                                                <h4><b>Direccion :</b>
                                            </label>
                                        </div>
                                        <div class="col-2 alinear">
                                            <input type="text" name="modal_direccion" id="modal_direccion">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btnEditarContacto">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

    </div><!--Fin div-->
    </form>


    <!--Fin Datos de Contacto-->

    <div class="contenedorDatosEditar">

        <!--Contraseña-->
        <legend class="centrado">Seguridad
            <div class="expandirDatosSeguridad">
                <img src="../../public/img/utilidades/expandir.png" alt="expandir informacion" style="height:'3rem'; width: 3rem">
            </div>
        </legend>

        <div class="datosSeguridad">
            <div class="btn">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarSeguridad">Editar</button>
        </div>
        </div>


    </div><!--Fin div-->



    <form id="formEditarSeguridad">
        <!-- Modal -->
        <div class="modal fade" id="modalEditarSeguridad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <!--quitar modal dialog daniel-->
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-backdrio-transparent"></div>

                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="container">
                            <div class="row d-none"><!--Documento-->

                                <div class="col-2 alinear">
                                    <label for="documento">
                                        <h4><b>Documento: </b>
                                    </label>
                                </div>

                                <div class="col-2 alinear">
                                    <input type="text" name="modal_doc_2" id="modal_doc_2">
                                </div>
                            </div>


                            <div class="row"><!--Contrasena-->

                                <div class="col-2 alinear">
                                    <label for="correo">
                                        <h4><b>Contraseña Actual: </b>
                                    </label>
                                </div>

                                <div class="col-2 alinear">
                                    <input type="Password" name="modal_clave" id="modal_clave">
                                </div>
                            </div>


                            <div class="row"><!--Repetir Contrasena-->

                                <div class="col-2 alinear">
                                    <label for="correo">
                                        <h4><b>Contraseña Nueva: </b>
                                    </label>
                                </div>

                                <div class="col-2 alinear">
                                    <input type="password" name="modal_validar_clave" id="modal_validar_clave">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-2 alinear">
                                    <label for="correo">
                                        <h4><b>Vuelve a Escribirla: </b>
                                    </label>
                                </div>

                                <div class="col-2 alinear">
                                    <input type="password" name="modal_confirma_clave" id="modal_confirma_clave">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnEditarSeguridad">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--Fin div-->
    </form>




    <!--Fin contraseña-->





    <!--
        <?php


        echo '<pre>';

        var_dump($_SESSION['doc']);

        echo '</pre>';

        ?>
        <label for="">Apellido(s): </label>
        <input type="text" name="apellido" value="<?php echo $consulta[2] ?>">

        <label for="">Correo: </label>
        <input type="email" name="email" value="<?php echo $consulta[3] ?>">

        <label for="">Genero: </label>
       
        <input type="text" name="genero" value=" <?php echo $consulta[4] ?>" readonly>
        

        <label for="">Fecha Nacimiento: </label>
        <input type="text" name="fecha_naci" value="<?php echo $consulta[5] ?>">

        <label for="">Tipo Doc: </label>
        <input type="text" name="tipo_doc" value="<?php echo $consulta[6] ?>" readonly/>
        


        <label for="">Documento Identidad: </label>
        <input type="number" name="doc" value="<?php echo $consulta[7] ?>"readonly >

    </fieldset>
    
   <fieldset>
        <legend>Datos de Domicilio</legend>

        <label for="">Telefono: </label>
        <input type="tel" name="tel" value="<?php echo $consulta[8] ?>">

        <label for="">Direccion: </label>
        <input type="text" name="direccion" value="<?php echo $consulta[10] ?>">


    </fieldset>
    
    <fieldset>

        <legend>Datos Cuenta</legend>
                        
        <label for="">Nueva Contraseña: </label>
        <input type="password" name="clave" >

    </fieldset>

    <br>
    <button type="submit" name="guardar">Guardar</button>
    

-->
    <!--Fin del formulario-->

    </div>
</section>
<a href="../perfil.php"><button type="submit" name="atras">Atras</button></a>