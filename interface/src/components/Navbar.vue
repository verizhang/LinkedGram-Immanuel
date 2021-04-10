<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white shadow-sm fixed-top">
        <router-link :to="{name:'home'}">
            <a class="navbar-brand" href="#">
                LinkedGram
            </a>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <router-link :to="{name:'home'}">
                        <a class="nav-link" href="">Aktifitas</a>
                    </router-link>
                </li>
                <li class="nav-item active">
                    <router-link :to="{name:'lowongan'}">
                         <a class="nav-link" href="">Lowongan</a>
                    </router-link>
                </li>
                <li class="nav-item active" v-if="!auth">
                    <router-link :to="{name:'register'}">
                        <a class="nav-link text-decoration-none mx-1" id="register">Daftar</a>
                    </router-link>
                </li>
                <li class="nav-item active" v-if="!auth">
                    <router-link :to="{name:'login'}">
                        <a class="nav-link text-decoration-none mx-1" id="login">Masuk</a>
                    </router-link>
                </li>
                <li class="nav-item active" v-if="auth">
                    <a class="nav-link text-decoration-none mx-1 btn" @click="logout">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name:'Navbar',
    data: function(){
        return {
            auth: false
        }
    },
    mounted: function(){
        let localAuth = JSON.parse(localStorage.getItem('alumni-smk-kristen-immanuel-pontianak'));
        if(localAuth){
            this.auth = true;
        }else{
            this.auth = false;
        }
    },
    methods:{
        logout: function(){
            localStorage.removeItem('alumni-smk-kristen-immanuel-pontianak');
            window.location.href = "/";
        }
    }
}
</script>