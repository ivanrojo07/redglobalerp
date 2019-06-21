<template>
	<div>
		
		<div class="card-header">
	       <div class="d-flex bd-highlight">
	            <div class="p-2 w-75 bd-highlight">
	                <h5>
	                    <i class="fas fa-truck-loading"></i> Servicios extras:
	                </h5>
	            </div>
	            <div class="p-2 flex-shrink-1 bd-highlight">
	                <button class="btn btn-secondary" type="button" @click="nuevoServicio()"><i class="fas fa-plus"></i> Agregar servicio </button>
	            </div>
	        </div>   
	   </div>
	   <div class="card-body" v-for="(index,servicio) in serv_extra">
	        <div class="row">
	            <div class="col-4 form-group">
	                <label>
	                    <i class="fas fa-asterisk"></i> Servicio
	                </label>
	                <select class="form-control" :name="'servicios['+index+']'" v-model="servicio.servicio_id">
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
	                <button class="btn btn-danger" type="button" @click="eliminarServicio(index)"><i class="far fa-times-circle">Eliminar servicio</i></button>
	            </div>
	        </div>
	   </div>
	</div>
</template>
<script>
	export default {
        data(){
            return{
                servicios:[],
                serv_extra:[]
            }
        },
        watch:{
        },
        methods:{
            
            getServicios(){
            	let servicio = $("#tipo_servicio").val(); 
                let url=`/RGC/public/getServicios/${servicio}`;
                 //let url=`/getServicios/${servicio}`;
                axios.get(url).then(res=>{
                    this.servicios=res.data.servicios;
                }).catch(err=>{
                    console.log('err',err);
                });
            },
            nuevoServicio(){
                let serv = {
                    servicio_id:"",
                    comentario:"",   
                };
                this.getServicios();
				this.serv_extra.push(serv);
            },
            eliminarServicio(index){
                this.serv_extra.splice(index,1);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

