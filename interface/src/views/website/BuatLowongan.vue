<template>
    <div class="container">
        <div class="row shadow p-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Judul Lowongan</label>
                    <input type="text" class="form-control" v-model="formData.judul_lowongan">
                </div>
                <div class="form-group">
                    <label>Gambar Lowongan</label>
                    <input type="file" class="form-control" @change="file($event)">
                </div>
                <div class="form-group">
                    <label>Deskripsi Lowongan</label>
                    <textarea class="form-control" v-model="formData.deskripsi_lowongan"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success form-control" @click="requestLowongan">Daftar</button>
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
                judul_lowongan:'',
                deskripsi_lowongan:'',
                gambar:'',
            }
        }
    },

    methods:{
        file: function(event){
            this.formData.gambar = event.target.files[0];
        },

        requestLowongan: function(){
            let form = new FormData();
            for(var key in this.formData){
                form.append(key, this.formData[key]);
            }
            form.append('user_id', this.auth.user_id);

            axios.post(this.api+'lowongan', form).then(function(response){
                if(response.data.message == "success"){
                    alert('lowongan anda telah ditambahkan, Terima kasih');
                }
            }).catch(error => console.log(error));
        }
    }
}
</script>