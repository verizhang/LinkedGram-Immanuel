<template>
    <div class="container">
        <div class="row shadow p-4">
            <div class="col-12 text-center mb-4 display-4">Daftar</div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" v-model="formData.nama">
                </div>
                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input type="text" class="form-control" v-model="formData.tahun_masuk">
                </div>
                <div class="form-group">
                    <label>Tahun Lulus</label>
                    <input type="text" class="form-control" v-model="formData.tahun_lulus">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" v-model="formData.jurusan">
                        <option v-for="item in jurusan" :value="item" :key="item">
                            {{item}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" v-model="formData.tanggal_lahir">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" v-model="formData.alamat"></textarea>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" v-model="formData.no_telepon">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="formData.email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="formData.password">
                </div>
                <div class="form-group">
                    <label>Gambar Profile</label>
                    <input type="file" class="form-control" id="gambar" @change="file($event)">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success form-control" @click="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name:'register',
    data: function(){
        return {
            jurusan:['TKJ','BDP','AKM'],
            formData:{
                nama:'',
                tahun_masuk:'',
                tahun_lulus:'',
                jurusan:'',
                tanggal_lahir:'',
                alamat:'',
                no_telepon:'',
                email:'',
                password:'',
                gambar:'',
            }
        }
    },
    methods:{
        file: function(event){
            this.formData.gambar = event.target.files[0];
        },

        register: function(){
            let form = new FormData();

            for(let key in this.formData){
                form.append(key , this.formData[key])                
            }

            axios.post(this.api+'register',form)
            .then(function(response){
                if(response.data){
                   let auth = {
                        user_id: response.data.user.id,
                        nama: response.data.user.nama,
                        profile: response.data.user.profile.gambar
                    };
                    localStorage.setItem('alumni-smk-kristen-immanuel-pontianak', JSON.stringify(auth));
                    window.location.href = "/";
                }
            });
        }
    }
}
</script>