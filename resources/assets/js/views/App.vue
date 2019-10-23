 <style>
    a{
        text-decoration: none;
        font-size: 15px;
        color: #000;
    }
    p{
        margin: 0px;
    }
    *{
        font-family: Times New Roman;
    }

    ul,li{ padding:0;margin:0;list-style:none}
    .header{
        box-shadow: 0 5px 5px rgba(0,0,0,.1);
        height: 75px;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        background-color: #fff;
        z-index: 97;
    }
    .header-center{
        width: 1200px;
        margin: 0 auto;
        height: 75px;
    }
    .logo{
        float: left;
        margin-top: 6px;

    }
    .logo img{
        height: 65px;
    }
    .header-nav{
        float: left;
        line-height: 75px;
        margin-top: 0;
    }
    .nav-ul .nav-li{
        position: relative;
        float: left;
        margin-left: 40px;
    }
    .container{
        min-height: 850px;
        padding-top: 75px;
    }
    .ecode{
        float: left;
        line-height: 75px;
        margin-left: 60px;
    }
    .ecode img{
        height: 70px;
    }
    .language{
        float: left;
        line-height: 75px;
        margin-left: 20px;
    }
    .search{
        float: left;
        line-height: 75px;
        margin-left: 20px;
    }
    .el-button--text {
    color: #000;
    }
    .ecode-img{
        width: 100%;
    }
    .after{
        float: right;
    }
    .el-dialog__header {
    display: none;
}
</style>
<template>
    <div>
        <div class="header">
            <div class="header-center">
                <div class="logo">
                    <img src="\images\logo3.jpg" alt="">
                </div>
                <div class="header-nav">
                    <ul class="nav-ul">
                        <li class="nav-li"><router-link :to="{ name: 'home' }"> {{$t("title.home")}}</router-link> </li>
                        <!-- <li class="nav-li">
                            <el-dropdown>
                                <router-link :to="{ name: 'hello' }">
                                <span class="el-dropdown-link">
                                    关于天正
                                </span>
                                </router-link>
                                <el-dropdown-menu slot="dropdown">
                                    <el-dropdown-item >公司介绍</el-dropdown-item>
                                    <el-dropdown-item >公司荣誉</el-dropdown-item>
                                </el-dropdown-menu>
                            </el-dropdown>
                         </li> -->
                        <li class="nav-li">
                            <!-- <el-dropdown> -->
                                <router-link :to="{ name: 'journalism' }">
                                <span class="el-dropdown-link">
                                   {{$t("title.new")}}
                                </span>
                                </router-link>
                                <!-- <el-dropdown-menu slot="dropdown">
                                    <el-dropdown-item >公司资讯</el-dropdown-item>
                                    <el-dropdown-item >行业资讯</el-dropdown-item>
                                </el-dropdown-menu> -->
                            <!-- </el-dropdown> -->
                        </li>
                        <li class="nav-li">
                            <!-- <el-dropdown> -->
                                <router-link :to="{ name: 'Cam' }">
                                <span class="el-dropdown-link">
                                   {{$t("title.manufacturing")}}
                                </span>
                                </router-link>
                                <!-- <el-dropdown-menu slot="dropdown">
                                    <el-dropdown-item >技术研发</el-dropdown-item>
                                    <el-dropdown-item >质量保证</el-dropdown-item>
                                    <el-dropdown-item >生产工艺</el-dropdown-item>
                                    <el-dropdown-item >设备支持</el-dropdown-item>
                                </el-dropdown-menu> -->
                            <!-- </el-dropdown> -->
                        </li>
                        <li class="nav-li">
                            <!-- <el-dropdown> -->
                                <router-link :to="{ name: 'product' }">
                                <span class="el-dropdown-link">
                                   {{$t("title.display")}}
                                </span>
                                </router-link>
                                <!-- <el-dropdown-menu slot="dropdown">
                                    <el-dropdown-item >模具展示</el-dropdown-item>
                                    <el-dropdown-item >产品展示</el-dropdown-item>
                                </el-dropdown-menu> -->
                            <!-- </el-dropdown> -->
                        </li>
                        <li class="nav-li"><a target="_blank" href="https://sm.mouldc.com/products"> {{$t("title.mall")}} </a></li>
                        <li class="nav-li"><a target="_blank" href="https://sm.mouldc.com/products"> {{$t("title.Receipt")}}</a> </li>
                        <!-- <li class="nav-li"><router-link :to="{ name: 'contactus' }">主要客户</router-link> </li> -->
                        <li class="nav-li"><router-link :to="{ name: 'contactus' }"> {{$t("title.contact")}}</router-link> </li>
                    </ul>
                </div>
                <div class="after">
                    <div class="ecode" >
                        <el-button type="text" @click="dialogVisible = true" >{{ $t("title.Mobile") }}</el-button>
                            <el-dialog
                            :visible.sync="dialogVisible"
                            width="500px"
                            model="false"
                            :append-to-body='true'
                            >
                                <span>
                                    <img class="ecode-img" src="/images/ecode.jpg" alt="">
                                </span>
                            </el-dialog>
                    </div>
                    <div class="language">
                        <el-dropdown>
                            <span class="el-dropdown-link">
                            {{ $t("title.Language") }}
                            </span>
                            <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item @click.native="toggleLang('zh')" :disabled="$i18n.locale == 'zh'">中文</el-dropdown-item>
                                <el-dropdown-item @click.native="toggleLang('en')" :disabled="$i18n.locale == 'en'">English</el-dropdown-item>
                                <el-dropdown-item @click.native="toggleLang('de')" :disabled="$i18n.locale == 'de'">Deutsch</el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <router-view v-if="isRouterAlive"></router-view>
        </div>
        <Foot></Foot>

    </div>
</template>
<script>
    import Foot from './Foot'
    export default {
        data() {
            return {
                dialogVisible: false,
                 isRouterAlive: true,
            };
        },
        components:{
            Foot
        },
       mounted(){
        this.toggleLang(this.$i18n.locale);
    },
      provide() {
    //父组件中通过provide来提供变量，在子组件中通过inject来注入变量。
    return {
      reload: this.reload
    };
  },
        methods:{
            toggleLang(lang) {
      if(lang == 'zh'){
        localStorage.setItem('locale', 'zh')
        this.$i18n.locale = localStorage.getItem('locale')
        document.getElementsByClassName('header-center')[0].style.width = '1200px';
      }
       else if (lang == 'en') {
        localStorage.setItem('locale', 'en')
        this.$i18n.locale = localStorage.getItem('locale')
        document.getElementsByClassName('header-center')[0].style.width = '1260px';
        }
       else if (lang == 'de') {
        localStorage.setItem('locale', 'de')
        this.$i18n.locale = localStorage.getItem('locale')
      document.getElementsByClassName('header-center')[0].style.width = '1420px';
        }
        this.reload();
    },
     reload() {
      this.isRouterAlive = false; //先关闭，
      this.$nextTick(function() {
        this.isRouterAlive = true; //再打开
      });
    }
        }
    }
</script>
