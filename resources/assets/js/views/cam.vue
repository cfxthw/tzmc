<style>
.cam-box {
  width: 1300px;
  margin: 0px auto;
  padding-bottom: 20px;
}
.cam-pictor {
  width: 100%;
  height: 280px;
}
.cam-header {
  border-bottom: #333 1px dotted;
  padding: 12px;
  font-size: 30px;
  margin-bottom: 30px;
}
.cam-position {
  float: right;
  font-size: 16px;
  padding-top: 16px;
}
.cam-box .el-tabs__item {
  height: 85px;
  line-height: 85px;
}
.el-tabs--right .el-tabs__header.is-right{
  width: 149px;
}
.cam-block{
    height: 500px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding-top: 40px;
    padding-right: 40px;
}
.cam-block-left{
   float: left;
    width: 53%;
    font-size: 20px;
    text-indent: 2em;
    line-height: 45px;
    padding-top: 22px;
    font-weight: 300;
    height: 80%;
}
.cam-block-right{
    float: right;
    width:45%;
    height: 80%;
}
.cam-block .swiper-wrapper{
    height: 100%;
    width:100%;
}
.cam-block .swiper-wrapper img{
    height: 80%;
    width:100%;
}
.zlbz{
    height: 85%;
    display: block;
    margin-left: 26%;
}
.cam-info-title{
    display: inline-block;
    padding-left: 10px;
    font-size: 23px;
    font-family: "Microsoft YaHei";
}
.cam-dian{
    padding-left: 14px;
    display: inline-block;
    font-size: 23px;
    font-weight: 700;
    font-family: "Microsoft YaHei";
}
</style>
<template>
    <div class="cam-box">
        <img class="cam-pictor" src="images/culture/模具制造标题图.png" alt="">
        <div class="cam-header">
            {{$t("title.manufacturing")}}
            <span class="cam-position">{{$t("journalism.position")}}-><a href="">{{$t("title.manufacturing")}}</a></span>
        </div>
        <div class="cam-content">
              <el-tabs :tab-position="tabPosition" style="height: 500px;">
               <el-tab-pane :label="$t('cam.technology')">
                <div><p class="cam-dian">·</p><p class="cam-info-title">{{ $t('cam.technology') }}</p></div>
                   <div class="cam-block">
                       <div class="cam-block-left">
                        {{$t("cam.technology_text1")}}
                        </div>
                       <div class="cam-block-right">
                           <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" v-for="(item,index) in image1" :key="index">
                                        <img :src="item.src">
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                </el-tab-pane>
                  <el-tab-pane :label="$t('cam.Quality')">
                    <div><p class="cam-dian">·</p><p class="cam-info-title">{{ $t('cam.Quality') }}</p></div>
                      <div class="cam-block">
                       <div class="cam-block-left">
                        {{$t("cam.technology_text2")}}
                        </div>
                       <div class="cam-block-right">
                           <img v-if="$i18n.locale == 'zh' " @click="Visible = true" class="zlbz" src="images/culture/质量保证(中文).png" alt="">
                           <el-dialog
                            :visible.sync="Visible"
                            width="500px"
                            model="false"
                            title="万泰认证"
                            :append-to-body='true'
                            >
                                <span>
                                    <img  class="ecode-img" v-if="$i18n.locale == 'zh'" src="images/culture/质量保证(中文).png" alt="">
                                    <img  class="ecode-img" v-if="$i18n.locale != 'zh'" src="images/culture/质量保证(英文).png" alt="">
                                </span>
                            </el-dialog>
                           <img v-if="$i18n.locale != 'zh'" @click="Visible = true" class="zlbz" src="images/culture/质量保证(英文).png" alt="">
                       </div>
                   </div>
                  </el-tab-pane>
                <!-- <el-tab-pane :label="$t('cam.process')">角色管理</el-tab-pane> -->
                <el-tab-pane :label="$t('cam.equipment')">
                <div><p class="cam-dian">·</p><p class="cam-info-title">{{ $t('cam.equipment') }}</p></div>
                   <div class="cam-block">
                       <div class="cam-block-left">
                        {{$t("cam.technology_text3")}}
                        </div>
                       <div class="cam-block-right">
                           <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" v-for="(item,index) in image2" :key="index">
                                        <img :src="item.src">
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                </el-tab-pane>
                 <el-tab-pane :label="$t('cam.System')">
                      <div><p class="cam-dian">·</p><p class="cam-info-title">{{ $t('cam.System') }}</p></div>
                 </el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>
<script>
import Swiper from "swiper";
import "swiper/css/swiper.css";
export default {
  data() {
    return {
      tabPosition: "right",
       activeName: '1',
       Visible:false,
       image1:[
        {
          src: "images/culture/技术研发2.png"
        },
        {
          src: "images/culture/技术研发1.png"
        },
        {
          src: "images/culture/技术研发5.png"
        },
        {
          src: "images/culture/技术研发4.png"
        },
        {
          src: "images/culture/技术研发3.png"
        }
      ],
      image2:[
        {
          src: "images/设备1.png"
        },
        {
          src: "images/设备2.png"
        },
        {
          src: "images/设备3.png"
        },
        {
          src: "images/设备4.png"
        },
        {
          src: "images/设备5.png"
        }
      ]
    };
  },
  mounted(){
     this.mySwiper();
  },
  methods:{
       mySwiper() {
      new Swiper(".swiper-container", {
        loop: true,
        autoplay: true,
        observer: true,
        observeParents: true
      });
    },
  }

};
</script>

