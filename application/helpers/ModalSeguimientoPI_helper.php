<?php

function construir_modal_pi($evento, $arraySoportesEvento) { ?>

    <div class="modal fade" id="myModal_<?php print $evento->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><?php print $evento->title; ?></h3>
                </div>
                <div class="modal-body">
                    <?php print $evento->description; ?>
                    <hr/>
                    <h4 class="modal-title" id="myModalLabel">Soportes</h4>
                    <br/>
                    <?php
                    foreach ($arraySoportesEvento as $soporte) {
                        $cadenaVisualizada = substr($soporte->nombre_soporte, 0, 40);
                        if (strlen($cadenaVisualizada) === 40) {
                            $cadenaVisualizada = $cadenaVisualizada . "...";
                        }
                        print "<div class='list-group-item' title='" . $soporte->nombre_soporte . "'><a class='soporte' href='" . $soporte->ruta_soporte . "' id='href_download_" . $soporte->idsoporte . "' download>" . $cadenaVisualizada . "</a></div>";//<a href='javascript:eliminar_soporte(" . $soporte->idsoporte . ")'  ><span class='glyphicon glyphicon-trash pull-right' aria-hidden='true'></span></a>
                    }
                    ?>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php }
?>

