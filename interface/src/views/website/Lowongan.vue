<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 border-left border-right">
                <SideProfile/>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="container container-content-view">
                    <div class="row">
                        <div class="col-12">
                            <div class="card w-100 my-2" v-for="item in lowongan" :key="item.id">
                                <img class="card-img-top" :src="'http://localhost:8000/'+ item.gambar" alt="Card image cap">
                                <div class="card-body">
                                    <h4>{{item.user}}</h4>
                                    <h6>{{item.judul_lowongan}}</h6>
                                    <p class="card-text">{{item.deskripsi_lowongan}}</p>
                                    <button class="btn btn-primary" v-if="item.status_lamar == false && item.user_id !== auth.user_id" @click="lamar(item.id)">Lamar Pekerjaan</button>
                                    <button class="btn btn-primary" v-if="item.status_lamar == true" disabled>Sudah Dilamar</button>
                                    <button class="btn btn-warning" v-if="item.user_id == auth.user_id">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import SideProfile from '@/components/SideProfile.vue';
export default {
    data(){
        return {
            lowongan:[],
        }
    },
    mounted(){
        this.requestLowongan();
        console.log(this.lowongan);
    },
    components:{
        SideProfile
    },
    methods:{
        requestLowongan: async function(){
            let request =await axios.get(this.api+'lowongan').then(function(response){
                return response.data;
            }).catch(error => console.log(error));

            for(let i=0; i<request.length; i++){
                let statusLamar = false;
                for(let j=0; j<request[i].pelamar.length; j++){
                    if(request[i].pelamar[j].user_id == this.auth.user_id){
                        statusLamar = true;
                    }else{
                        statusLamar = false;
                    }
                }
                let item ={
                    id: request[i].id,
                    user_id: request[i].user_id,
                    user: request[i].user.nama,
                    gambar: request[i].gambar,
                    judul_lowongan: request[i].judul_lowongan,
                    deskripsi_lowongan: request[i].deskripsi_lowongan,
                    status_lamar: statusLamar,
                }
                this.lowongan.push(item);
            }
        },

        lamar: async function(lowongan_id){
            let form = new FormData();
            form.set('user_id', this.auth.user_id);
            form.set('lowongan_id', lowongan_id);

            let lamar = await axios.post(this.api+'lowongan/lamar', form).then(response => response.data).catch(error => console.log(error));
            this.$router.push({ name: 'home' });
        }
    }
}
</script>
<style scoped>
.container-content-view{
    height: 100vh;
    overflow-y: scroll;
}
.card-img-top{
    height: 200px;
    object-fit: cover;
}
::-webkit-scrollbar{
    width: 0px;
}
</style>