<template>
    <div class="container container-side-profile">
        <div class="row">
            <div class="col-sm-12 col-md-12 text-center">
                <router-link :to="{name:'profileAktifitas', params:{id:1}}">
                    <img src="@/assets/image/gedung.jpg" class="profile-picture rounded-circle">
                    <h6 class="mt-3 text-dark">Veri</h6>
                </router-link> 
            </div>
            <div class="col-sm-12 col-md-12">
                <router-link :to="{name:'buatAktifitas'}">
                    <h6 class="p-2 mt-1 bg-light text-dark">Buat Aktifitas</h6>
                </router-link>
                <router-link :to="{name:'buatLowongan'}">
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