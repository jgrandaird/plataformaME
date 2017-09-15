<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <?php
    construir_encabezado($Titulo, $Referencia);
    ?>

    <div class="table-responsive">
        <form id="formid" name="formid">

            <div class="panel panel-default">
                <div class="panel-heading">
                    &nbsp;
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Periodo
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" id="ulperiodo">


                                <?php
                                $i = 0;
                                foreach ($objPeriodo->arrayPeriodos as $periodo) {
                                    ?>
                                    <li>
                                        <a href="<?php print $periodo->idperiodo; ?>" id="divperiodo_<?php print $periodo->idperiodo; ?>"><?php print $periodo->codigo_periodo; ?>
                                        </a>
                                        <input type="hidden" name="hidden_periodo_<?php print $i; ?>" id="hidden_periodo_<?php print $i; ?>" value="<?php print $periodo->idperiodo; ?>" >
                                        <input type="hidden" name="nombre_periodo_<?php print $periodo->idperiodo; ?>" id="nombre_periodo_<?php print $periodo->idperiodo; ?>" value="<?php print $periodo->codigo_periodo; ?>" >
                                    </li>
                                    <?php
                                    $i++;
                                }
                                ?>
                                <input type="hidden" name="num_periodo" id="num_periodo" value="<?php print $i; ?>" >


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                <?php
                //Si hay periodo...
                
                if($idperiodo){?>
                
                
                    <ul class="nav nav-pills"> <!-- nav-tabs -->
                        <?php
                        foreach ($objRegional->arrayRegionales as $regional) {
                            ?>
                            <li>
                                <a href="#tab_<?php print $regional->idregional; ?>" data-toggle="tab">
                                    <?php print $regional->nombre_regional; ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                    <div class="tab-content">
                        <?php foreach ($objRegional->arrayRegionales as $regional) { ?>
                            <div class="tab-pane fade" id="tab_<?php print $regional->idregional; ?>">
                                <table class="table table-bordered table-hover table-condensed" id="tabla_regional">
                                    <tr >
                                        <td>
                                            <br/>
                                            <a href="<?php print $regional->idregional; ?>" id="regional_planeado_<?php print $regional->idregional; ?>">Nube de actividades planeadas</a>
                                            <div id="my_favorite_latin_words_planeado_<?php print $regional->idregional; ?>" style="width: 950px; height: 500px; border: 1px solid #ccc;display:none"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br/>
                                            <a href="<?php print $regional->idregional; ?>" id="regional_ejecutado_<?php print $regional->idregional; ?>">Nube de actividades ejecutadas</a>
                                            <div id="my_favorite_latin_words_ejecutado_<?php print $regional->idregional; ?>" style="width: 950px; height: 500px; border: 1px solid #ccc;display:none"></div>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        <?php }
                        ?>
                    </div>
                
                
                <?php
                }?>
                </div>
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
                <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $idproyecto; ?>">
                <input type="hidden" name="idperiodo" id="idperiodo" value="<?php print $idperiodo; ?>">
                <input type="hidden" name="rutaModulo" id="rutaModulo" value="<?php print $rutaModulo; ?>">
            </div>
        </form>
    </div>
</div>