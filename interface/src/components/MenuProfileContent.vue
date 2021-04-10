<template>
    <div class="row mt-4">
            <div class="col-6 text-center">
                <router-link :to="{name:'profileAktifitas', params:{id: params}}">
                    <h6 class="text-dark">Aktifitas</h6>
                </router-link>
            </div>
            <div class="col-6 text-center">
                <router-link :to="{name:'profileLowongan', params:{id: params}}">
                    <h6 class="text-dark">Lowongan</h6>
                </router-link>
            </div>
    </div>
</template>
<script>
export default{
    props: ['params']
}
</script>