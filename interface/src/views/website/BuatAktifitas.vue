<template>
    <div class="container">
        <div class="row shadow p-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Judul Aktifitas</label>
                    <input type="text" class="form-control" v-model="formData.judul_aktifitas">
                </div>
                <div class="form-group">
                    <label>Gambar Aktifitas</label>
                    <input type="file" class="form-control" @change="file($event)">
                </div>
                <div class="form-group">
                    <label>Deskripsi Aktifitas</label>
                    <textarea class="form-control" v-model="formData.deskripsi_aktifitas"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success form-control" @click="requestAktifitas">Daftar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return {
            formData:{
                judul_aktifitas:'',
                deskripsi_aktifitas:'',
                gambar:'',
            }
        }
    },

    methods:{
        file: function(event){
            this.formData.gambar = event.target.files[0];
        },

        requestAktifitas: function(){
            let form = new FormData();
            for(var key in this.formData){
                form.append(key, this.formData[key]);
            }
            form.append('user_id', this.auth.user_id);

            axios.post(this.api+'aktifitas', form).then(function(response){
                if(response.data.message == "success"){
                    alert('Aktifitas anda telah ditambahkan, Terima kasih');
                }
            }).catch(error => console.log(error));
        }
    }
}
</script>