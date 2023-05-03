<template lang="">
    <div>
        <Navbar :ruta="ruta" :usuario="usuario"></Navbar>
        <!-- Left side column. contains the logo and sidebar -->
        <Sidebar :ruta="ruta" :usuario="usuario"></Sidebar>
        <!-- Content Wrapper. Contains page content -->
        <!--<Content :ruta="ruta"></Content>-->
        <div class="content-wrapper">
            <transition name="slide-fade" mode="out-in">
                <router-view></router-view>
            </transition>
        </div>
        <!-- /.content-wrapper -->
        <Footer :ruta="ruta"></Footer>
    </div>
</template>
<script>
import Navbar from "./plantilla/Navbar"
import Sidebar from "./plantilla/Sidebar"
import Footer from "./plantilla/Footer"
    export default {
        'props': ['ruta','usuario'],
        'components': {Navbar,Sidebar, Footer}
    }
</script>
<style lang="">

</style>
