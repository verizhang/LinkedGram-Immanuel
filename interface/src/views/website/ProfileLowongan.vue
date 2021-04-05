<template>
    <div class="container">
        <div class="row shadow-sm rounded p-4">
            <div class="col-sm-12 col-md-3 text-center">
                <img src="@/assets/image/gedung.jpg" class="profile-picture rounded-circle">
            </div>
            <div class="col-sm-12 col-md-9 d-flex flex-column justify-content-center">
                <h3>Veri</h3>
                <h6>Teknik Komputer & Jaringan</h6>
                <h6>2018 - 2021</h6>
                <h6>+62 856 5453 4628</h6>
            </div>
        </div>
        <MenuProfileContent/>
        <div class="row mt-2">
            <div class="col-sm-12 col-md-6">
                <div class="card w-100 my-2">
                    <img class="card-img-top" src="@/assets/image/gedung.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h6>Card title</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Lihat Informasi</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card w-100 my-2">
                    <img class="card-img-top" src="@/assets/image/gedung.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h6>Card title</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Lihat Informasi</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card w-100 my-2">
                    <img class="card-img-top" src="@/assets/image/gedung.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h6>Card title</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Lihat Informasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import MenuProfileContent from '@/components/MenuProfileContent.vue';
export default {
    components:{
        MenuProfileContent
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