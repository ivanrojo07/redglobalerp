<template>
    <div>
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    <h4 class="title"><i class="fas fa-boxes"></i> Mercancias:</h4>
                </div>
                <div class="ml-auto p-2 bd-highlight">
                    <button class="btn btn-secondary" type="button" @click="nuevoProducto()"><i class="fas fa-plus"></i> Nueva Mercancia</button>
                </div>
            </div>
        </div>
        <div class="card" v-for="(mercancia,index) in mercancias">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight">
                        <h5>
                            <i class="fas fa-box"></i> Mercancia {{index+1}}:
                        </h5>
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button type="button" class="close" aria-label="Close" @click="removerProducto(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>   
            </div>
            <div class="card-body">
                <div class="form-row form-group">
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Datos generales de la mercancia:
                        </h4>
                    </div>
                    <div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Nombre de la mercancia:
                        </label>
                        <input type="text" :name="'nombre['+index+']'" class="form-control" v-model="mercancia.nombre" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Naturaleza del producto/Commodity:
                        </label>
                        <select class="form-control" id="naturaleza" :name="'naturaleza['+index+']'" v-model="mercancia.naturaleza" required>
                            <option value="">Seleccione una opción</option>                            
                            <option v-for="commodity in commodities" :value="commodity.nombre" :title="commodity.descripcion">{{commodity.nombre}}</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Tipo de servicio:
                        </label>
                        <select class="form-control" id="tipo_servicio" :name="'tipo_servicio['+index+']'" v-model="mercancia.tipo_servicio" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Terrestre FTL">Terrestre FTL</option>
                            <option value="Terrestre LTL">Terrestre LTL</option>
                            <option value="Maritimo FCL">Maritimo FCL</option>
                            <option value="Maritimo LCL">Maritimo LCL</option>
                            <option value="Aereo">Aereo</option>
                            <option value="Ferroviario">Ferroviario</option>
                        </select>
                    </div>
                    <div class="col-4 form-group" id="clase_peligrosa" style="display: none">
                        <label><i class="fas fa-asterisk"></i> Clase</label>
                        <input type="number" class="form-control" v-model="mercancia.peligroso_clase" :name="'peligroso_clase['+index+']'" max="9" min="1"></input>
                    </div>
                    <div class="col-4 form-group" id="nu_peligroso" style="display: none">
                        <label><i class="fas fa-asterisk"></i> NU</label>
                        <input type="text" class="form-control" v-model="mercancia.peligroso_nu" :name="'peligroso_nu['+index+']'">
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Dirección de origen
                        </h4>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Linea 1</label>
                        <textarea rows="1" type="text" class="form-control" v-model="mercancia.linea1_origen" :name="'linea1_origen['+index+']'" required=""></textarea>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Código Postal</label>
                        <input type="text" class="form-control" v-model="mercancia.cp_origen" :name="'cp_origen['+index+']'" required="">
                    </div>

                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Dirección de destino
                        </h4>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Linea 1</label>
                        <textarea rows="1" type="text" class="form-control" v-model="mercancia.linea1_destino" :name="'linea1_destino['+index+']'" required=""></textarea>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Código Postal</label>
                        <input type="text" class="form-control" v-model="mercancia.cp_destino" :name="'cp_destino['+index+']'" required="">
                    </div>

                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> eta</label>
                        <input type="date" class="form-control" v-model="mercancia.eta" :name="'eta['+index+']'" required="">
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-question-circle"></i>Requiere despacho aduanal</label>
                        <input type="checkbox" v-model="mercancia.despacho_aduanal" :name="'despacho_aduanal['+index+']'">
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Dimensiones y peso de la mercancia
                        </h4>
                    </div>
                    <div class="col-6">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Volumen:
                        </label>
                        <div class="input-group mb-3">
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="alto" aria-label="alto" :name="'alto['+index+']'" v-model="mercancia.alto" aria-describedby="x-addon1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="x-addon1">x</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="ancho" aria-label="ancho" :name="'ancho['+index+']'" v-model="mercancia.ancho" aria-describedby="x-addon2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="x-addon2">x</span>
                            </div>
                            <input type="number" step="0.01" min="0.01" required class="form-control" placeholder="profundidad" aria-label="profundo" :name="'profundo['+index+']'" v-model="mercancia.profundo" aria-describedby="x-addon2">
                        </div>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Unidad:
                        </label>
                        <select class="form-control" :name="'medidas['+index+']'" v-model="mercancia.medidas" required>
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
                            <i class="fas fa-asterisk"></i> Peso Bruto:
                        </label>
                        <input type="number" step="0.01" min="0.01" class="form-control" :name="'peso_br['+index+']'" v-model="mercancia.peso_br" required>
                    </div>
                    <div class="col-3">
                        <label class="control-label">
                            <i class="fas fa-asterisk"></i> Unidad:
                        </label>
                        <select class="form-control mb-3" :name="'medida_peso['+index+']'" v-model="mercancia.medida_peso" required>
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
                            <i class="fas fa-asterisk"></i> Número de bultos:
                        </label>
                        <input type="number" step="0.1" min="0.1" class="form-control" :name="'bultos['+index+']'" v-model="mercancia.bultos" required>
                    </div>
                    <div class="col-2">
                        <label><i class="fas fa-asterisk"></i> Peso Total:</label>
                        <div class="input-group mb-3">
                            <input type="number" step="0.1" min="0.1"  class="form-control" :name="'peso_total['+index+']'" v-model="mercancia.peso_total" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">{{mercancia.medida_peso}}</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-2">
                        <label><i class="fas fa-asterisk"></i> Volumen Total:</label>
                        <div class="input-group mb-3">
                             <input type="number" step="0.1" min="0.1"  class="form-control" :name="'volumen_total['+index+']'" v-model="mercancia.volumen_total"  aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">{{mercancia.medidas == "" ? mercancia.medidas : mercancia.medidas+"³" }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Observaciones de la mercancia
                        </h4>
                    </div>
                    <div class="col-12">
                        <label>Observaciones:</label>
                        <textarea class="form-control" :name="'observaciones['+index+']'" v-model="mercancia.observaciones"></textarea>
                    </div>
                </div>
            </div>
           <div class="card-header">
               <div class="d-flex bd-highlight">
                    <div class="p-2 w-75 bd-highlight">
                        <h5>
                            <i class="fas fa-truck-loading"></i> Servicios extras para mercancia {{index+1}}:
                        </h5>
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button class="btn btn-secondary" type="button" @click="nuevoServicio(mercancia)"><i class="fas fa-plus"></i> Agregar servicio </button>
                    </div>
                </div>   
           </div>
           <div class="card-body" v-for="servicio in mercancia.serv_extra">
                <div class="row">
                    <div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Servicio
                        </label>
                        <select class="form-control" :name="'servicios['+index+'][]'" v-model="servicio.servicio_id">
                            <option value="">Seleccione el servicio</option>
                            <option v-for="serv in servicios" :value="serv.id" title="servicio.descripcion">{{serv.nombre}}</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label>
                            Comentario
                        </label>
                        <textarea class="form-control" :name="'comentario_serv['+index+'][]'" v-model="servicio.comentario"></textarea>
                    </div>
                    <div class="col-2 form-group b-2">
                        <button class="btn btn-danger" type="button" @click="eliminarServicio(mercancia,index)"><i class="far fa-times-circle">Eliminar servicio</i></button>
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
                mercancias:[],
                commodities:[],
                servicios:[],
            }
        },
        watch:{
            mercancias: {
              handler: function (val, oldVal) {
                for (var i = val.length - 1; i >= 0; i--) {
                    if(val[i].alto != "" && val[i].ancho != "" && val[i].profundo != "" ){
                        val[i].volumen_total = val[i].alto*val[i].ancho*val[i].profundo;
                    }
                    if (val[i].peso_br) {
                        val[i].peso_total = val[i].peso_br;
                    }
                    if (val[i].tipo_servicio) {
                        // console.log(val[i].tipo_servicio);
                        this.getServicios(val[i].tipo_servicio);
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
                    line1_origen:"",
                    line2_origen:"",
                    cp_origen:"",
                    line1_destino:"",
                    line2_destino:"",
                    cp_destino:"",
                    naturaleza:"",
                    alto:"",
                    ancho:"",
                    profundo:"",
                    medidas:"",
                    peso_br:"",
                    medida_peso:"",
                    bultos:"",
                    peso_total:"",
                    volumen_total:"",
                    tipo_servicio:"",
                    observaciones:"",
                    serv_extra:[]
                }
                this.mercancias.push(producto);
            },
            removerProducto(index){
                if(this.mercancias.length > 1){
                    this.mercancias.splice(index,1);

                }
            },
            getCommodities(){

                let url = "/rgc/getCommodities";
                //let url = "/getCommodities";
                axios.get(url).then(res=>{
                    this.commodities = res.data.commodities;
                }).catch(err=>{
                    console.log('err',err);
                });
            },
            getServicios(servicio){
                let url=`/rgc/getServicios/${servicio}`;
                 //let url=`/getServicios/${servicio}`;
                axios.get(url).then(res=>{
                    this.servicios=res.data.servicios;
                }).catch(err=>{
                    console.log('err',err);
                });
            },
            nuevoServicio(mercancia){
                let serv = {
                    servicio_id:"",
                    comentario:"",   
                };
                mercancia.serv_extra.push(serv);
            },
            eliminarServicio(mercancia,index){
                mercancia.serv_extra.splice(index,1);
            }
        },
        mounted() {
            let producto = {
                nombre:"",
                line1_origen:"",
                line2_origen:"",
                cp_origen:"",
                line1_destino:"",
                line2_destino:"",
                cp_destino:"",
                naturaleza:"",
                alto:"",
                ancho:"",
                profundo:"",
                medidas:"",
                peso_br:"",
                medida_peso:"",
                bultos:"",
                peso_total:"",
                volumen_total:"",
                tipo_servicio:"",
                observaciones:"",
                serv_extra:[]
            }
            this.mercancias.push(producto);
            this.getCommodities();
            console.log('Component mounted.')
        }
    }
</script>
