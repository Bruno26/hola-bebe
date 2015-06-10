<style>
    .huge {
        font-size: 40px;
    }
</style>
<section class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);">Visión General de Protocolización</h1>
    </div>
</section>

<section class="row" >
    <div class="col-lg-4 col-md-35">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-home" style=" font-size: 75px;"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_desarrollo; ?></div>
                        <div>Desarrollos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-35">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-home" style=" font-size: 75px;"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_unidades_habitacionales; ?></div>
                        <div>Unidades Habitacionales</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-35">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-home" style=" font-size: 75px;"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_viviendas; ?></div>
                        <div>Viviendas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-lg-6 col-md-40">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-user" style=" font-size: 75px;"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_beneficiarios; ?></div>
                        <div>Beneficiarios</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-40">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-user" style=" font-size: 75px;"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_beneficiarios; ?></div>
                        <div>Grupos Familiares</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
