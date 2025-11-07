<template>
   <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 title text-center">
                <h1>Felicitar</h1>
            </div>
        </div>
        <hr>
        <div class="row pt-3">
            <div class="col-12">
                <form @submit.prevent="crear" enctype="multipart/form-data">
                    <div class="row ps-5">
                        <div class="col-10">
                            <label for="name" class="form-label">Nombre</label>
                            <input  required v-model="form.name" type="text"  class="form-control" >
                            <div  class="form-text">
                                Escribe un nombre con el que Dennis te pueda identificar
                            </div>
                        </div>
                    </div>
                    <div class="row ps-5 pt-3">
                        <div class="col-10">
                            <label for="name" class="form-label">Identificador</label>
                            <input  required v-model="form.identificador" type="text"  class="form-control" >
                            <div  class="form-text">
                                Un apodo o algo para que Dennis te identifique, puede ser una palabra, la escuela donde estudias o donde se conocieron
                            </div>
                        </div>
                    </div>
                    <div class="row ps-5 pt-3 ">
                        <div class="col-10">
                            <label for="inputPassword5" class="form-label">Felicitacion</label>
                            <textarea  maxlength="400" required v-model="form.text" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            <div  class="form-text">
                                Escribe un mensaje de felicitaciones para Dennis. Max 400 caracteres
                            </div>
                        </div>
                    </div>
                    <div class="row ps-5 pt-3 pb-5">
                        <div class="col-10">
                            <label for="inputPassword5" class="form-label">Foto</label>
                            <input type="file" @change="selected_file" class="form-control">
                            <div  class="form-text">
                                Opcional
                            </div>
                        </div>
                    </div>           
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-12 form-check pt-2">
                            <button type="submit" class="btn btn-outline-primary">Enviar</button>
                        </div>

                    </div>
                </form>
                <div class="row  ps-3 justify-content-end pb-5">
                        <div class="col-12 pt-2">
                            <a href="/"><button class="btn btn-outline-danger">Atras</button></a>
                        </div>
                </div>
            </div>
        </div>
   </div>
</template>

<script>

export default {
    props:{
    },
    data(){
        return{
            form: {
                    name: null,
                    identificador:null,
                    text:null,
                    img: null,
                },
        }
    },
    beforeMount(){
    },
    methods:{
        crear(){
            let fields = new FormData();
            
            fields.append('name','hols');
            fields.append('identificador',this.form.identificador);
            fields.append('text',this.form.text);
            fields.append('img',this.form.img);
            
            axios.post(route('congratulation.store',fields)).then(r =>{
                console.log(r.data);
            });
            //console.log(response.data);
            //location.href ='/';
        },
        selected_file(event){
            this.form.img = event.target.files[0];
        },

    },
}
</script>

<style>
.title h1{
    font-size: 30px;
}

</style>