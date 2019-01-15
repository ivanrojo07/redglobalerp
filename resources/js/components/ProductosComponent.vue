<template>
    <div class="container-fluid">
        <div class="mt-3 mb-3 d-flex justify-content-start">
            <button class="btn btn-secondary" type="button" @click="nuevoProducto()">Nuevo Producto</button>
        </div>
        <div class="card mb-3" v-for="(prod,index) in productos">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight">
                        <h5>Producto {{index+1}}:</h5>
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button type="button" class="close" aria-label="Close" @click="removerProducto(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>   
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label class="control-label">
                            Nombre:
                        </label>
                        <input type="text" name="nombre[]" class="form-control" v-model="prod.nombre" required>
                    </div>
                    <div class="col-6">
                        <label class="control-label">
                            Volumen:
                        </label>
                        <div class="input-group mb-3">
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="alto" aria-label="alto" name="alto[]" v-model="prod.alto" aria-describedby="x-addon1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="x-addon1">x</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="ancho" aria-label="ancho" name="ancho[]" v-model="prod.ancho" aria-describedby="x-addon2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="x-addon2">x</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="profundidad" aria-label="profundo" name="profundo[]" v-model="prod.profundo" aria-describedby="x-addon2">
                        </div>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            Unidad:
                        </label>
                        <select class="form-control" name="medidas[]" v-model="prod.medidas" required>
                            <option value="">Seleccione la unidad de medida</option>
                            <option value="km">Kilómetro</option>
                            <option value="hm">Hectómetro</option>
                            <option value="dam">Decámetro</option>
                            <option value="m">Metro</option>
                            <option value="dm">Decimetro</option>
                            <option value="cm">Centimetro</option>
                            <option value="mm">Milímetro</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            Naturaleza del envio:
                        </label>
                        <select class="form-control" name="naturaleza[]" v-model="prod.naturaleza" required>
                            <option value="">Seleccione la naturaleza del producto</option>
                            <option value="Perecedero">Perecedero</option>
                            <option value="Electronicos">Electronicos</option>
                            <option value="Ropa">Ropa</option>
                            <option value="Material de construcción">Material de construcción</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            Peso Bruto:
                        </label>
                        <input type="number" step="0.01" min="0.01" class="form-control" name="peso_br[]" v-model="prod.peso_br" required>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            Unidad:
                        </label>
                        <select class="form-control mb-3" name="medida_peso[]" v-model="prod.medida_peso" required>
                            <option value="">Seleccione la unidad de medida</option>
                            <option value="kg">Kilógramo</option>
                            <option value="hg">Hectógramo</option>
                            <option value="dag">Decágramo</option>
                            <option value="g">Gramo</option>
                            <option value="dg">Decigramo</option>
                            <option value="cg">Centigramo</option>
                            <option value="mg">Milígramo</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            Número de bultos:
                        </label>
                        <input type="number" step="0.1" min="0.1" class="form-control" name="bultos[]" v-model="prod.bultos" required>
                    </div>
                    <div class="col-4">
                        <label class="control-label">
                            Origen:
                        </label>
                        <input type="text" class="form-control" name="origen[]" v-model="prod.origen" required>
                    </div>
                    <div class="col-4">
                        <label class="control-label">
                            Destino:
                        </label>
                        <input type="text" class="form-control mb-3" name="destino[]" v-model="prod.destino" required>
                    </div>
                    <div class="col-2">
                        <label>Peso Total:</label>
                        <div class="input-group mb-3">
                            <input type="number" step="0.1" min="0.1"  class="form-control" name="peso_total[]" v-model="prod.peso_total" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">{{prod.medida_peso}}</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-2">
                        <label>Volumen Total:</label>
                        <div class="input-group mb-3">
                             <input type="number" step="0.1" min="0.1"  class="form-control" name="volumen_total[]" v-model="prod.volumen_total"  aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">{{prod.medidas == "" ? prod.medidas : prod.medidas+"³" }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="observaciones[]" v-model="prod.observaciones"></textarea>
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
                productos:[],
            }
        },
        watch:{
            productos: {
              handler: function (val, oldVal) {
                for (var i = val.length - 1; i >= 0; i--) {
                    if(val[i].alto != "" && val[i].ancho != "" && val[i].profundo != "" ){
                        val[i].volumen_total = val[i].alto*val[i].ancho*val[i].profundo;
                    }
                    if (val[i].peso_br) {
                        val[i].peso_total = val[i].peso_br;
                    }
                }
              },
              deep: true
            }
        },
        methods:{
            nuevoProducto(){
                let producto = {
                    nombre:"",
                    alto:"",
                    ancho:"",
                    profundo:"",
                    medidas:"",
                    naturaleza:"",
                    peso_br:"",
                    medida_peso:"",
                    bultos:"",
                    origen:"",
                    destino:"",
                    peso_total:"",
                    volumen_total:"",
                    observaciones:""
                }
                this.productos.push(producto);
            },
            removerProducto(index){
                if(this.productos.length > 1){
                    this.productos.splice(index,1);

                }
            }
        },
        mounted() {
            let producto = {
                nombre:"",
                alto:"",
                ancho:"",
                profundo:"",
                medidas:"",
                naturaleza:"",
                peso_br:"",
                medida_peso:"",
                bultos:"",
                origen:"",
                destino:"",
                peso_total:"",
                volumen_total:"",
                observaciones:""
            }
            this.productos.push(producto)
            console.log('Component mounted.')
        }
    }
</script>
