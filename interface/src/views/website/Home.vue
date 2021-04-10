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
                            <div class="card w-100 my-2" v-for="item in aktifitas" :key="item.id">
                                <img class="card-img-top" :src="'http://localhost:8000/' + item.gambar" alt="Card image cap">
                                <div class="card-body">
                                    <h4>{{item.user.nama}}</h4>
                                    <h6>{{item.judul_aktifitas}}</h6>
                                    <p class="card-text">{{item.deskripsi_aktifitas}}</p>  
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
            aktifitas:[],
        }
    },
    mounted(){
        this.requestAktifitas();
    },
    components:{
        SideProfile
    },
    methods:{
        requestAktifitas: async function(){
            let request =await axios.get(this.api+'aktifitas').then(function(response){
                return response.data;
            }).catch(error => console.log(error));
            this.aktifitas = request;
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