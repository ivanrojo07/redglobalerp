<template>
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Gastos Aerolinea</h5>
                </div>
                <div class="offset-8 col">
                    <button class="btn btn-secondary btn-sm" type="button" @click="nuevoGasto()"><i class="fas fa-plus-circle"> Nuevo Gasto</i></button>
                </div>
            </div>
        </div>
        <div class="card card-default" v-for="(gasto,index) in gastos">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight">
                        Gasto #{{index+1}}:
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button type="button" class="close" aria-label="Close" @click="removerGasto(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>   
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-4 mb-2">
                        <label class="control-label">
                            Nombre del gasto:
                        </label>
                        <input type="text" name="nombre_gasto[]" v-model="gasto.nombre" class="form-control">
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">
                            Total del gasto:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input class="form-control" type="number" step="0.01" min="1" name="total_gasto" v-model="gasto.total_gasto">
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
                gastos:[]
            }
        },
        watch:{
            gastos:{
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
            nuevoGasto(){
                let gasto = {
                    'nombre':'',
                    'total_gasto':'',
                    'peso':''
                };
                this.gastos.push(gasto);
            },
            removerGasto(index){
                this.gastos.splice(index,1);
            }
        },
        mounted() {
            // this.nuevoGasto();
            console.log('Component mounted.')
        }
    }
</script>
