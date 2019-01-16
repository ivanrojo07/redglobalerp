<template>
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Cargos Aerolinea</h5>
                </div>
                <div class="offset-8 col">
                    <button class="btn btn-secondary btn-sm" type="button" @click="nuevoCargo()"><i class="fas fa-plus-circle"> Nuevo Cargo</i></button>
                </div>
            </div>
        </div>
        <div class="card card-default" v-for="(cargo,index) in cargos">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight">
                        Cargo #{{index+1}}:
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button type="button" class="close" aria-label="Close" @click="removerCargo(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>   
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-4 mb-2">
                        <label class="control-label">Nombre del cargo:</label>
                        <input class="form-control" type="text" name="nombre_cargo" v-model="cargo.nombre" required>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">Minimo:</label>
                        <input class="form-control" type="number" step="0.01"  name="minimo" v-model="cargo.minimo">
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">Tarifa por kilogramo:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input class="form-control" type="number" step="0.01" min="1" name="tarifa_unit" v-model="cargo.tarifa_unit">
                            <div class="input-group-append">
                                <span class="input-group-text">USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">Peso por kilogramo:</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" step="0.01" min="1" name="peso" v-model="cargo.peso">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">KG.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">Total:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input class="form-control" type="text" name="tarifa_total" v-model="cargo.tarifa_total" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                cargos:[]
            }
        },
        watch:{
            cargos:{
                handler: function (val, oldVal) {
                for (var i = val.length - 1; i >= 0; i--) {
                    if(val[i].tarifa_unit != "" && val[i].peso != "" ){
                        val[i].tarifa_total = val[i].tarifa_unit*val[i].peso;
                    }
                }
              },
              deep: true
            }
        },
        methods:{
            nuevoCargo(){
                let cargo = {
                    'nombre':'',
                    'minimo':'',
                    'peso':''
                };
                this.cargos.push(cargo);
            },
            removerCargo(index){
                if(this.cargos.length > 1){
                    this.cargos.splice(index,1);

                }
            }
        },
        mounted() {
            this.nuevoCargo();
            console.log('Component mounted.')
        }
    }
</script>
