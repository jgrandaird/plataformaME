<?php

function construir_modal_pi_detalle($evento, $arrayAutores, $arraySoportesEvento) {
    $idpersona = $evento->idpersona;
    ?>

    <div class="modal fade" id="myModal_detalle_<?php print $evento->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><?php print $evento->title; ?></h3>
                </div>
                <div class="modal-body">
                    <label class="control-label" for="autor">Autor(a):</label>
                    <?php print $arrayAutores[$idpersona]; ?>
                    <br/>
                    <?php print $evento->description; ?>
                    <hr/>
                    <h4 class="modal-title" id="myModalLabel">Soportes</h4>
                    <br/>
                    <?php
                    foreach ($arraySoportesEvento as $soporte) {
                        $cadenaVisualizada = substr($soporte->nombre_soporte, 0, 40);
                        $decode_cadena = utf8_encode($soporte->ruta_soporte);
                        if (strlen($cadenaVisualizada) === 40) {
                            $cadenaVisualizada = $cadenaVisualizada . "...";
                        }
                        print "<div class='list-group-item' title='" . $soporte->nombre_soporte . "'><a class='soporte' href='" . $decode_cadena . "' id='href_download_" . $soporte->idsoporte . "' download>" . $cadenaVisualizada . "</a></div>"; //<a href='javascript:eliminar_soporte(" . $soporte->idsoporte . ")'  ><span class='glyphicon glyphicon-trash pull-right' aria-hidden='true'></span></a>
                    }
                    ?>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php
}

function construir_modal_pi_reporte($evento, $arrayAutores) {

    $idpersona = $evento->idpersona;
    ?>

    <div class="modal fade" id="myModal_reporte_<?php print $evento->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><?php print $evento->title; ?></h3>
                </div>
                <div class="modal-body">
                    <label class="control-label" for="autor">Autor(a):</label>
                    <?php print $arrayAutores[$idpersona]; ?>
                    <br/>
                    <label class="control-label" for="label_fecha_novedad_<?php print $evento->id;?>">Fecha:</label>
                    <input type="text" class="form-control" id="fecha_novedad_<?php print $evento->id;?>" name="fecha_novedad_<?php print $evento->id;?>"/>
                    <label class="control-label" for="label_contenido_novedad_<?php print $evento->id;?>">Observación:</label>
                    <textarea class="form-control" id="contenido_novedad_<?php print $evento->id;?>" name="contenido_novedad_<?php print $evento->id;?>"></textarea>
                    <input type="text" class="form-control" id="identificador_evento" name="identificador_evento" value="<?php print $evento->id;?>"/>
                    <br/>
                    <a href="">Ver histórico de observaciones</a>
                    <!--
                    <hr/>
                    <h4 class="modal-title" id="myModalLabel">Histórico de observaciones</h4>
                    -->


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idevento" id="idevento" value="<?php print $evento->id;?>" />
                    <input type="hidden" name="idpersona" id="idpersona" value="<?php print $idpersona;?>" />
                    
                    <button type="button" class="btn btn-primary" id="btn_guardar_novedad_<?php print $evento->id;?>" name="btn_guardar_novedad_<?php print $evento->id;?>">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
                
                
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php
}
?>

