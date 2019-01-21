<template>
    <div class="card card-default">
        <div class="card-header">{{producto.nombre}}</div>
        <div class="card-body">
            <div class="row form-group">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Origen:</span>
                        </div>
                        <span class="input-group-text" id="basic-addon2">{{producto.origen}}</span>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Destino:</span>
                        </div>
                        <span class="input-group-text" id="basic-addon2">{{producto.destino}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tiempo de transito:</span>
                        </div>
                        <input type="number" step="1" min="1" id="min" onchange="document.getElementById('max').min=this.value;" class="form-control" name="dia_inicio">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">a:</span>
                        </div>
                        <input type="number" step="1" min="$('min').val()" id="max" class="form-control" name="dia_fin">
                        <select class="form-control" name="tiempo">
                            <option>Horas</option>
                            <option>Días</option>
                            <option>Semanas</option>
                            <option>Meses</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <cargoterrestre-component></cargoterrestre-component>
    </div>
</template>

<script>
    export default {
        props:[
            'producto'
        ],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
