@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4">
                    <h4>Datos del Perfil:</h4>
                </div>
                @foreach(Auth::user()->perfil->componentes as $componente)
                @if($componente->nombre == 'indice perfiles')
                <div class="col-sm-4 text-center">
                    <a href="{{ route('perfil.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Perfiles</strong></button></a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-4">
                    <label class="control-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $perfil->nombre }}" readonly="">
                </div>
            </div>


            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 info">
                            <label class="control-label">Modulos:</label>
                        </div>
                    </div>
                    <div class="row">
                        @php($j = 0)
                        @foreach($modulos as $modulo)
                        @if($j % 2 == 0)
                        <div class="col">
                        @endif
                        @php($j++)
                        @if(Auth::user()->perfil->id != 1 && $modulo->nombre == 'seguridad')
                        @else
                        <ul class="list-group list-group-flush">
                            <table class="table table-hover table-bordered" style="margin-bottom: 0px; background: #fff;">
                                <tr style="background: #f4f4f4;">
                                    <th class="col-sm">
                                        <label class="control-label">{{ $modulo->nombre}}</label>
                                    </th>
                                    <td class="col-sm text-center">
                                        <input type="checkbox" id="mod{{ $j }}" disabled="">
                                    </td>
                                </tr>
                                @php($i = 0)
                                @foreach($modulo->componentes as $componente)
                                <tr>
                                    <td class="col-sm">{{ $componente->nombre }}</td>
                                    <td class="col-sm text-center">
                                        <input type="checkbox" id="cmp{{ ++$i }}mod{{ $j }}" name="componente_id[]" value="{{ $componente->id }}"
                                        <?php
                                            foreach($perfil->componentes as $cmp)
                                                if($componente->id == $cmp->id)
                                                    echo " checked ";
                                        ?>
                                        disabled="">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </ul>
                        @endif
                         @if($j % 2 == 0)
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @foreach(Auth::user()->perfil->componentes as $componente)
            @if($componente->nombre == 'editar perfil')
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-center">
                    <a href="{{ route('perfil.edit', ['id' => $perfil->id]) }}"><button class="btn btn-warning"><i class="fa fa-check-pencil" aria-hidden="true"></i> Editar</button></a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
    
<script type="text/javascript">

    $(document).ready(function() {
        <?php $j = 0; ?>
        @foreach($modulos as $modulo)
            <?php $j++; ?>
            <?php $i = 0; ?>
            @foreach($modulo->componentes as $componente)
                if($('#cmp1mod{{ $j }}').prop('checked')
                <?php $k = 0; ?>
                @foreach($modulo->componentes as $componente)
                    @if($k == 0)
                        <?php $k++; ?>
                    @else
                        && $('#cmp{{ ++$k }}mod{{ $j }}').prop('checked')
                    @endif
                @endforeach
                ) {
                    $('#mod{{ $j }}').prop('checked', true);
                } else {
                    $('#mod{{ $j }}').prop('checked', false);
                }
            @endforeach
        @endforeach
    });
</script>
    
@endsection