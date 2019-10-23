<style>
.product-item {
  margin-top: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.product-image {
  border: 1px solid #e5e5e5;
  box-shadow: 0 3px 3px #e5e5e5;
  width: 24%;
  text-align: center;
  margin-bottom: 30px;
  height: 322px;
}
.product-image img {
  display: block;
  width: 150px;
  height: 150px;
  margin: 51px auto;
  transition: 1.2s;
}
.product-name {
  font-size: 20px;
  line-height: 70px;
  background-color: #f0f0f0
}
.null {
  height: 0;
  width: 314px;
}
.box .el-tabs__content {
  height: 100%;
  padding-bottom: 24px;
}
.product-image:hover  img{
  width: 220px;
  height: 220px;
  margin:16px auto;
  /* transition: 0.8s; */
}
</style>


<template>
    <div class="box">
        <img class="new-pictor" src="images/17.jpg">
        <div class="company-header">{{ $t("home.product_display")}}<span class="company-position">{{$t("journalism.position")}}->{{ $t("home.product_display")}}</span>
        </div>
        <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane :label=" $t('home.mold_display')" name="first">
                 <ul class="product-item">
                     <li v-for="(item,index) in name " :key="index" class="product-image">
                            <img  :src="  name[index].product_image  ">
                            <p class="product-name" v-if="$i18n.locale == 'zh'">{{ name[index].product_name_zh }}</p>
                            <p class="product-name" v-if="$i18n.locale == 'en'">{{ name[index].product_name_en }}</p>
                            <p class="product-name" v-if="$i18n.locale == 'de'">{{ name[index].product_name_de }}</p>
                     </li>
                     <li class="null"></li>
                     <li class="null"></li>
                     <li class="null"></li>
                     <li class="null"></li>
                 </ul>
           <el-pagination
                 background
                 layout="prev, pager, next"
                 :page-size="pageSize"
                 @current-change="handleCurrentChange"
                 :current-page.sync ="currentPage"
                 :total="totalCount">
            </el-pagination>

                </el-tab-pane>
                <el-tab-pane :label=" $t('home.product_show')" name="second">
                     <ul class="product-item">
                     <li v-for="(item,index) in namm " :key="index" class="product-image">

                            <img  :src="  namm[index].product_image  ">
                            <p class="product-name" v-if="$i18n.locale == 'zh'">{{ namm[index].product_name_zh }}</p>
                            <p class="product-name" v-if="$i18n.locale == 'en'">{{ namm[index].product_name_en }}</p>
                            <p class="product-name" v-if="$i18n.locale == 'de'">{{ namm[index].product_name_de }}</p>
                     </li>
                     <li class="null"></li>
                     <li class="null"></li>
                     <li class="null"></li>
                     <li class="null"></li>
                 </ul>
             <el-pagination
                 background
                  @current-change="handleCurrentChange"
                  :current-page.sync ="currentPage"
                  :page-size="pageSize"
                  layout="prev, pager, next"
                 :total="totalCountt">
            </el-pagination>
                </el-tab-pane>
            </el-tabs>
    </div>
</template>




<script>
import PicZoom from "vue-piczoom";
export default {
  data() {
    return {
      activeName: "first",
      tabPosition: "left",
       name:'',
        namm:'',
        totalCount:0,
        currentPage :1,
        pageSize:2,
        totalCountt:0,

    };
  },
  components: {
    PicZoom
  },
    created(){
          this.goback();
      },
  methods: {
    handleCurrentChange(pageIndex=1) {
        this.goback(pageIndex)
      },
       handleClick(pageIndex=1) {
           this.goback(pageIndex=1)
        this.currentPage=1
      },

      goback(page){
       this.axios({
         methods:'get',
         params :{
           page
         },
         url:'api/product',

       }).then(res=>{
         this.name=res.data[0].data
         this.namm=res.data[1].data
         this.totalCount=res.data[0].total
         this.totalCountt=res.data[1].total
          console.log(res)
       }).catch(function(error){
          console.log(error)
       })
      },
  }
};
</script>
