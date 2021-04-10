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
            <div class="col-sm-12 col-md-6" v-for="item in data.aktifitas" :key="item.id">
                <div class="card w-100 my-2">
                    <img class="card-img-top" :src="'http://localhost:8000/'+item.gambar" alt="Card image cap">
                    <div class="card-body">
                        <h6>{{item.judul_aktifitas}}</h6>
                        <p class="card-text">{{item.deskripsi_aktifitas}}</p>
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
            data:{}
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
            let data = await axios.get(this.api+'aktifitas/'+this.params).then(response => response.data).catch(error=>console.log(error))
            this.data = data[0];
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