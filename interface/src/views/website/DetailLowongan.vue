<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 border-left border-right">
                <SideProfile/>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="container container-content-view">
                    <div class="row shadow-sm m-1 p-2 rounded d-flex flex-row align-items-center" v-for="item in data.pelamar" :key="item.id">
                        <div class="col-3 col-md-1">
                            <img :src="'http://localhost:8000/'+item.user.profile.gambar" class="profile-image rounded-circle position-relative">
                        </div>
                        <div class="col-9 col-md-11 text-left d-flex flex-row justify-content-between align-items-center">
                            <div>
                                <div class="font-weight-bold">{{item.user.nama}}</div>
                                <div>{{item.user.profile.jurusan}}</div>
                            </div>
                            <div>
                                <router-link :to="{name:'profileAktifitas', params:{id:item.user.id}}">
                                    <button class="btn btn-outline-success">
                                        See Profile
                                    </button>
                                </router-link>
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
            data:{},
        }
    },
    mounted(){
        this.requestPelamar()
    },
    components:{SideProfile},
    methods:{
        requestPelamar: async function(){
            let data = await axios.get(this.api+'lowongan/detail/'+this.$route.params.id).then(response=>response.data).catch(error=> console.log(error));
            this.data = data;
        }
    }
}
</script>
<style scoped>
.profile-image{
    object-fit: cover;
    width: 50px;
    height: 50px;
}
.container-content-view{
    height: 100vh;
    overflow-y: scroll;
}
</style>