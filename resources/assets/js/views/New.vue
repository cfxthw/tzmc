<style>
.container {
  background: url("/images/background1.jpg");
}
.box {
  width: 1300px;
  margin: 0 auto;
}
.new {
  width: 93%;
  /* margin: 0 auto; */
}
.new-title {
  text-align: center;
  font-size: 30px;
}
.new-text {
  font-size: 17px;
  line-height: 50px;
  text-indent: 2em;
  margin-top: 4%;
  float: left;
  margin-bottom: 4%;
  color: #2a333c;
}
.new-text img{
  /* float: left; */
  max-width:900px;
  margin-bottom: 10px;
}
.new-Recommend {
  text-align: center;
  font-size: 25px;
  margin-top: 50px;
    width: 325px;
}
.new-Recommend-title {
  margin-top: 8%;
  font-size: 17px;
    text-align: left;
}
.new-Recommend-time {
  float: right;
  font-size: 14px;
}
.new-more {
  font-size: 17px;
  float: right;
}
.new-time {
  text-align: center;
  margin-top: 18px;
}
.new-pictor {
  margin-top: 30px;
  margin-bottom: 10px;
  width: 1300px;
  height: 400px;
}
.company-position a {
  font-size: 17px;
}
.new-Recommend-new {
  height: 50px;
  color: #777777;
}
</style>
<template>
    <div class="box">
          <img class="new-pictor" src="/images/17.jpg">
          <div class="company-header" v-if="news.iscompanynews===1">{{ $t('journalism.company') }}<span class="company-position">{{$t("journalism.position")}}-><router-link :to="{ name: 'journalism' }">{{ $t("journalism.News") }}
          </router-link>
            <span >->{{ $t('journalism.company') }}</span>
          </span>
          </div>
          <div class="company-header" v-else>{{ $t('journalism.information') }}<span class="company-position">{{$t("journalism.position")}}-><router-link :to="{ name: 'journalism' }">{{ $t("journalism.News") }}
          </router-link>
            <span >->{{ $t('journalism.information') }}</span>
          </span>
          </div>
        <el-row>
        <el-col :span="18">
            <div class="new">
            <p class="new-title">{{ title}}</p>
            <p class="new-time">{{ $t('new.time') }}： {{news.time.substring(0,10)}}</p>
            <div v-html="content" class="new-text">
                {{ content}}
            </div>
        </div></el-col>
        <el-col :span="6">
            <div class="new-Recommend">
               {{ $t('new.latestnews') }} <span class="new-more"><router-link  :to="{ name: 'journalism' }">{{ $t('home.more') }}</router-link></span>
            <div v-for="(item,index) in more"  :key="index" >
                <div class="new-Recommend-new" v-if="$i18n.locale == 'zh'" >
                    <router-link target="_blank" :to="{ name: 'new',params: { id: item.id  } }">
                  <p class="new-Recommend-title" :title="item.titlezh">{{ item.titlezh }}</p>
                  <p class="new-Recommend-time">{{ item.time.substring(0,10) }}</p>
                    </router-link>
                </div>
                <div class="new-Recommend-new" v-if="$i18n.locale == 'en'" >
                    <router-link target="_blank" :to="{ name: 'new',params: { id: item.id  } }">
                  <p class="new-Recommend-title" :title="item.titleen">{{ item.titleen }}</p>
                  <p class="new-Recommend-time">{{ item.time.substring(0,10) }}</p>
                    </router-link>
                </div>
                <div class="new-Recommend-new" v-if="$i18n.locale == 'de'" >
                    <router-link target="_blank" :to="{ name: 'new',params: { id: item.id  } }">
                  <p class="new-Recommend-title" :title="item.titlede">{{ item.titlede}}</p>
                  <p class="new-Recommend-time">{{ item.time.substring(0,10) }}</p>
                    </router-link>
                </div>
            </div>
                        </div>
        </el-col>
        </el-row>
    </div>
</template>
<script>
    export default {
    data() {
      return {
       news:'',
       more:'',
       content:'',
       title:''
      };
    },
    created(){
        this.gobacks()
    },
    methods: {
      gobacks(){
        let id = this.$route.params.id
        this.axios({
          methods:'get',
          url:'/api/new/'+id,

        }).then(res=>{
            if(this.$i18n.locale == 'zh'){
                this.content=res.data[0][0].contentzh;
                this.title=res.data[0][0].titlezh;
            }
            if(this.$i18n.locale == 'en'){
                this.content=res.data[0][0].contenten;
                this.title=res.data[0][0].titleen;
            }
            if(this.$i18n.locale == 'de'){
                this.content=res.data[0][0].contentde;
                this.title=res.data[0][0].titlede;
            }
          this.news=res.data[0][0]
          this.more=res.data[1]
          console.log(this.content)
        }).catch(function(error){
            console.log(error)
        })
        },
           handleScroll () {
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
   var offsetTop = document.querySelector('.new-Recommend').offsetTop
    if(scrollTop>=500){
      document.getElementsByClassName('new-Recommend')[0].style.position = 'fixed';
      document.getElementsByClassName('new-Recommend')[0].style.top = '15%';
      document.getElementsByClassName('new-Recommend')[0].style.width = '325px';
      document.getElementsByClassName('new-Recommend')[0].style.left = '50%';
      document.getElementsByClassName('new-Recommend')[0].style.marginLeft='325px';
        // $(".new-Recommend").addClass("topfix");
    }
    else{
      document.getElementsByClassName('new-Recommend')[0].style.position = 'static';
       document.getElementsByClassName('new-Recommend')[0].style.marginLeft='0';
    }
  console.log(scrollTop,offsetTop)
},

    },
     mounted () {
  window.addEventListener('scroll', this.handleScroll)
 },
    }
</script>
