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
                            <div class="card w-100 my-2">
                                <img class="card-img-top" src="@/assets/image/gedung.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h6>Card title</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                </div>
                            </div>
                            <div class="card w-100 my-2">
                                <img class="card-img-top" src="@/assets/image/gedung.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h6>Card title</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                </div>
                            </div>
                            <div class="card w-100 my-2">
                                <img class="card-img-top" src="@/assets/image/gedung.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h6>Card title</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
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
import SideProfile from '@/components/SideProfile.vue';
export default {
    components:{
        SideProfile
    },
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