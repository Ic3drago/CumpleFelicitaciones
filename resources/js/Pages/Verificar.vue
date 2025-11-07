<template>
    <div class="container">
        <div class="row pt-4 pb-2">
            <div class="col-12 pb-4 title text-center">
                <h1>Felicitaciones</h1>
            </div>
            <hr>
        </div>
        <div class="divi"></div>
        <div class="row pt-3">
            <div v-for="(congra) in c" :key="congra.id" class="col-6">

                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img v-if="congra.img == null" src="/assets/img/felicitaciones/no-img.jpeg" width="100" height="100"
                            alt="...">
                        <img v-else :src="'/assets/img/felicitaciones/' + congra.img" width="100" height="100" alt="...">
                        <h5 class="card-title">{{ congra.name }}</h5>
                        <h6 class="card-text"> {{ congra.identificador }}</h6>
                        <p class="card-text">{{ congra.description }}</p>
                        <p><b>Status: </b> {{ congra.status }} </p>
                        <button @click="destroy(congra)" class="btn btn-outline-danger">Desactivar</button>
                        <button @click="acept(congra)" class="btn btn-outline-dark">Activar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        congratulations: Object,
    },
    data() {
        return {
            c: null,
        }
    },
    beforeMount() {
        this.info();
    },
    methods: {
        info() {
            this.c = this.congratulations;
            console.log(this.c);
        },
        async destroy(p) {
            const response = await axios.delete(route('congratulation.delete', p.id));
            console.log(response.data);
            location.href = '/felicitar-verificar';
        },
        async acept(p) {
            const response = await axios.get(route('congratulation.aceptar', p.id));
            console.log(response.data);
            location.href = '/felicitar-verificar';
        }
    }
}
</script>

<style>
.text {
    width: 100%;
}

.altura {
    height: 300px;
}

.altura2 {
    height: 100px;
}
</style>