<template>
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Cargos Terrestre</h5>
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
                        Cargo #{{index+1}}
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button type="button" class="close" aria-label="Close" @click="removerCargo(index)">
                            <span aria-label="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-4 mb-2">
                        <label class="control-label">Nombre del cargo:</label>
                        <input class="form-control" type="text" name="nombre_cargo[]" v-model="cargo.nombre" required>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">Descripción:</label>
                        <textarea class="form-control" name="descripcion_cargo[]" v-model="cargo.descripcion"></textarea>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="control-label">Costo:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input class="form-control" type="text" name="costo_cargo[]" v-model="cargo.costo" required>
                            <div class="input-group-append">
                                <span class="input-group-text">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <div class="col-4">
                    <div class="input-group">
                         <div class="input-group-prepend">
                            <span class="input-group-text">Total:</span>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input class="form-control" type="number" name="total[]" v-model="total" readonly="">
                        <div class="input-group-append">
                            <span class="input-group-text">USD</span>
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
                cargos:[],
                total:0.00
            }
        },
        watch:{
            cargos:{
                handler: function (val, oldVal) {
                for (var i = val.length - 1; i >= 0; i--) {
                    if(val[i].costo != ""){
                       this.getTotal()
                    }
                }
              },
              deep: true
            }
        },
         methods:{
            'getTotal':_.debounce(function(){
                let total = 0;
                this.cargos.forEach(cargo=>{
                    total += +cargo.costo;
                })
                this.total = total.toFixed(2);
            },500),
            nuevoCargo(){
                let cargo = {
                    'nombre':'',
                    'descripcion':'',
                    'costo':''
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
