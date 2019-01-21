<template>
    <div class="card card-default">
        <div class="card-header">{{producto.nombre}}</div>
        <div class="card-body">
            <div class="row form-group">
                <div class="col-12">
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
            </div>
        </div>
        <cargomaritimo-component></cargomaritimo-component>
        <gastomaritimo-component></gastomaritimo-component>
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
