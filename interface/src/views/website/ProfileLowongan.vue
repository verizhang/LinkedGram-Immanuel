<template>
    <div class="container">
        <div class="row shadow-sm rounded p-4">
            <div class="col-sm-12 col-md-3 text-center">
                <img :src="'http://localhost:8000/'+data.profile.gambar" class="profile-picture rounded-circle">
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column justify-content-center">
                <h3>{{data.nama}}</h3>
                <h6>{{data.profile.jurusan}}</h6>
                <h6>{{data.profile.tahun_masuk}} - {{data.profile.tahun_lulus}}</h6>
                <h6>{{data.profile.no_telepon}}</h6>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column justify-content-center">
                <h6>Tanggal Lahir: {{data.profile.tanggal_lahir}}</h6>
                <h6>Alamat: {{data.profile.alamat}}</h6>
            </div>
        </div>
        <MenuProfileContent :params="params"/>
        <div class="row mt-2">
            <div class="col-sm-12 col-md-6" v-for="item in lowongan" :key="item.id">
                <div class="card w-100 my-2">
                    <img class="card-img-top" :src="'http://localhost:8000/'+ item.gambar" alt="Card image cap">
                    <div class="card-body">
                        <h6>{{item.judul_lowongan}}</h6>
                        <p class="card-text">{{item.deskripsi_lowongan}}</p>
                        <button class="btn btn-primary" v-if="item.status_lamar == false && item.user_id !== auth.user_id" @click="lamar(item.id)">Lamar Pekerjaan</button>
                        <button class="btn btn-primary" v-if="item.status_lamar == true" disabled>Sudah Dilamar</button>
                        <router-link :to="{name:'detailLowongan', params:{id:item.id}}">
                            <button class="btn btn-warning" v-if="item.user_id == auth.user_id">Lihat Detail</button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import MenuProfileContent from '@/components/MenuProfileContent.vue';
export default {
    data(){
        return{
            params: this.$route.params.id,
            data:{},
            lowongan:[],
        }
    },
    mounted(){
        this.requesData();
    },
    components:{
        MenuProfileContent
    }, 
    methods:{
        requesData: async function(){
            let data = await axios.get(this.api+'lowongan/'+this.params).then(response => response.data).catch(error=>console.log(error))
            this.data = data[0];

            let lowongan = data[0].lowongan;
            for(let i=0; i<lowongan.length; i++){
                let statusLamar = false;
                for(let j=0; j<lowongan[i].pelamar.length; j++){
                    if(lowongan[i].pelamar[j].user_id == this.auth.user_id){
                        statusLamar = true;
                    }else{
                        statusLamar = false;
                    }
                }
                let item ={
                    id: lowongan[i].id,
                    user_id: lowongan[i].user_id,
                    gambar: lowongan[i].gambar,
                    judul_lowongan: lowongan[i].judul_lowongan,
                    deskripsi_lowongan: lowongan[i].deskripsi_lowongan,
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
.profile-picture{
    height: 200px;
    width: 200px;
    object-fit: cover;
}
.card-img-top{
    height: 200px;
    object-fit: cover;
}
</style>