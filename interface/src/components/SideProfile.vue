<template>
    <div class="container container-side-profile">
        <div class="row">
            <div class="col-sm-12 col-md-12 text-center">
                <router-link :to="{name:'profileAktifitas', params:{id:this.auth.user_id}}" v-if="this.auth !== 'blank'">
                    <img :src="'http://localhost:8000/'+this.auth.profile" class="profile-picture rounded-circle">
                    <h6 class="mt-3 text-dark">{{this.auth.nama}}</h6>
                </router-link>
                <img src="@/assets/image/guest.png" v-if="this.auth == 'blank'" class="profile-picture rounded-circle">
                <h6 class="mt-3 text-dark" v-if="this.auth == 'blank'">Guest User</h6>
            </div>
            <div class="col-sm-12 col-md-12">
                <router-link :to="{name:'buatAktifitas'}" v-if="this.auth !== 'blank'">
                    <h6 class="p-2 mt-1 bg-light text-dark">Buat Aktifitas</h6>
                </router-link>
                <router-link :to="{name:'buatLowongan'}" v-if="this.auth !== 'blank'">
                    <h6 class="p-2 mt-1 bg-light text-dark">Buat Lowongan</h6>
                </router-link>
            </div>
        </div>
    </div>
</template>
<style scoped>
.profile-picture{
    width: 100px;
    height: 100px;
    object-fit: cover;
}
</style>