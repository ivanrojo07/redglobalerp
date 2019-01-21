<template>
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Cargos adicionales</h5>
                </div>
                <div class="offset-8 col">
                    <button class="btn btn-secondary btn-sm" type="button" @click="nuevocargo()"><i class="fas fa-plus-circle"> Nuevo cargo</i></button>
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
                        <button type="button" class="close" aria-label="Close" @click="removercargo(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>   
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-4 mb-2">
                        <label class="control-label">
                            Nombre del cargo:
                        </label>
                        <input type="text" name="nombre_cargo[]" v-model="cargo.nombre" class="form-control">
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">
                            Descripción:
                        </label>
                        <textarea name="descripcion_cargo[]" v-model="cargo.descripcion" class="form-control"></textarea>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">
                            Costo:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input class="form-control" type="number" step="0.01" min="1" name="total_cargo" v-model="cargo.total_cargo">
                            <div class="input-group-append">
                                <span class="input-group-text">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            nuevocargo(){
                let cargo = {
                    'nombre':'',
                    'total_cargo':'',
                    'peso':''
                };
                this.cargos.push(cargo);
            },
            removercargo(index){
                this.cargos.splice(index,1);
            }
        },
        mounted() {
            // this.nuevocargo();
            console.log('Component mounted.')
        }
    }
</script>