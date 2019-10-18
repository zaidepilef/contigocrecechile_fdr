<div class="card">




    <div class="card-body">
        <h4 class="card-title">Roles del Sistema</h4>
        <h5 class="card-title">Configure los accesos de Módulos para cada Rol</h5>

        <div class="table-responsive">

            @foreach($roles as $item)

            <div class="card">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                    </div>
                    <h4 class="card-title m-b-0">{{$item->rol_name}}</h4>
                </div>

                <div class="card-body b-t collapse show">

                    <div class="row demo-swtich">
                        @foreach($modulos as $item)

                        <div class="col-sm-3">
                            <div class="demo-switch-title">{{$item->module_name }}</div>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked=""><span class="lever switch-col-light-blue"></span></label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            @endforeach

        </div>
    </div>
</div>