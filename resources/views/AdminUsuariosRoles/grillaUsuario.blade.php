<div class="card">

    <div class="card-header">
        <div class="card-actions">
            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
        </div>
        <h4 class="card-title m-b-0">Lista de Usuarios</h4>
    </div>

    <div class="card-body b-t collapse show">
        <table id="tableUsuarios" class="table table-striped" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">

            <thead>
                <tr role="row">
                    <th>Usuario LDAP</th>
                    <th class="sorting">Nombre</th>
                    <th class="sorting">Apellido</th>
                    <th class="sorting">Email</th>
                    <th class="sorting">Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $item)
                <tr role="row" class="odd">
                    <td>{{$item->name}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        {{ $roles->firstWhere('id',$item->rol_id)->rol_name }}
                    </td>

                    <td class="text-nowrap">
                        <a value="{{$item}}" id="{{$item->id}}" class="edit-user btn btn-circle btn-success" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil"></i> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>