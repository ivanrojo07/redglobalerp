@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="card ">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4>Perfiles:</h4>
                    </div>
                    @foreach(Auth::user()->perfil->componentes as $componente)
                    @if($componente->nombre == 'crear perfil')
                    <div class="col-sm-4 text-center">
                        <a class="btn btn-success" href="{{ route('perfil.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Perfil</strong></a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        @if($perfiles->last()->nombre == 'Admin')
                        <h4>Aún no se han agregado perfiles.</h4>
                        @else
                        <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;">
                            @foreach($perfiles as $perfil)
                            @if($perfil->id == 1)
                            @else
                            <?php $seguridad = false; ?>
                            @foreach($perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "seguridad")
                            <?php $seguridad = true; ?>
                            @endif
                            @endforeach
                            @if(Auth::user()->perfil->id != 1 && $seguridad)
                            @else
                            <tr>
                                <td style="width: 60% !important">{{ $perfil->nombre }}</td>
                                <td style="width: 40% !important">
                                    <div class="container">
                                        <div class="row justify-content-md-center">
                                            @foreach(Auth::user()->perfil->componentes as $componente)
                                                @if($componente->nombre == 'indice perfiles')
                                                <div class="col">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('perfil.show', ['id' => $perfil->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong></a>
                                                </div>
                                                @endif
                                                @if($componente->nombre == 'editar perfil')
                                                <div class="col">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('perfil.edit', ['id' => $perfil->id]) }}"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                                </div>
                                                @endif
                                                @if($componente->nombre == 'eliminar perfil')
                                                <div class="col">
                                                    <form method="post" action="{{ route('perfil.destroy', ['id' => $perfil->id]) }}" style="">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash" aria-hidden="true"></i><strong> Borrar</strong></button>
                                                    </form>
                                                </div>
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endif
                            @endforeach
                        </table>
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection