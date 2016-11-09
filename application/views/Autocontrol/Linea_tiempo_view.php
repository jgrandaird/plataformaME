<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <?php
    construir_encabezado($Titulo, $Referencia);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> <?php print $nombre_macroactividad;?>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="timeline">
                <?php
                $i = 1;
                foreach ($objEventos->result() as $evento) {
                    $orientacion = "";
                    $indiceEvento=$evento->id;
                    if ($i % 2 == 0) {
                        $orientacion = "timeline-inverted";
                    }
                    ?>
                    <li class="<?php print $orientacion; ?>">
                        <div class="timeline-badge <?php print $arrayColorEvento[$indiceEvento];?>">
                            <i class="fa fa-check "></i>
                        </div>
                        <div class="timeline-panel ">
                            
                            <!-- -->
                            
                            <div class="alert alert-<?php print $arrayColorEvento[$indiceEvento];?>">
                                
                            
                            <div class="timeline-heading ">
                                <h4 class="timeline-title"><?php print $evento->title; ?> </h4>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php print $evento->date; ?></small>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <p><?php print $evento->description; ?></p>
                                <hr>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                Soportes&nbsp; <span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                
                                foreach($arraySoportes[$indiceEvento] as $soporte){?>
                                <li><a href="<?php print $soporte->ruta_soporte;?>" download><?php print $soporte->nombre_soporte;?></a>
                                </li>
                                <?php
                                }?>
                                <li class="divider"></li>
                                <li><a href="#">Notas M&E</a>
                                </li>
                            </ul>
                        </div>
                            </div>
                            </div>
                            <!-- Cierra -->
                            
                        </div>
                    </li>
                    <?php
                    $i++;
                }
                ?>
            </ul>
        </div>
    </div>
    <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
                        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $idproyecto; ?>">
</div>