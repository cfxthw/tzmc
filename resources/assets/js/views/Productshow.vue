
蒋波波 2019/10/17 15:40:00
<style>
.pic-box {
  width: 300px;
  height: 300px;
  margin-right: 400px;
  float: left;
}
.pic-box .pic-zoom {
  width: 150px;
  height: 300px;
}
.productshow-picture {
  width: 1300px;
  margin: auto;
}
.show-pictor {
  width: 1300px;
  height: 400px;
}
.show-name {
  text-align: center;
  font-size: 30px;
}
.show-title {
  text-indent: 2em;
  line-height: 30px;
}
</style>
<template>

    <div class="productshow-picture">
        <img class="show-pictor" src="/images/17.jpg">
        <div v-if="is===1" class="company-header">
          {{ $t('productshow.Brief') }}<span class="company-position">{{ $t("journalism.position") }}-><router-link :to="{ name: 'product' }">{{ $t('product.display') }}</router-link>->{{ $t('productshow.Brief') }}</span>
        </div>
        <div v-if="is===0" class="company-header">
          {{ $t('productshow.Brief') }}<span class="company-position">{{ $t("journalism.position") }}-><router-link :to="{ name: 'product' }">{{ $t('product.Product') }}</router-link>->{{ $t('productshow.Brief') }}</span>
        </div>
        <div class="pic-box">
            <pic-zoom :show-eidt="true" class="zoom-image" :url='img'  :scale="2"></pic-zoom>
        </div>
             <div >
            <p class="show-name" >{{ name}}</p>
            <div v-html="name_content" class="show-title"></div>
        </div>
            </div>
</template>
<script>
import PicZoom from "vue-piczoom";
export default {
  data() {
    return {
      name: "",
      name_content:'',
      lang:'',
      img:'',
      is:'',
    };
  },
  components: {
    PicZoom
  },
  created() {
    this.gobacks();
    this.lang=localStorage.getItem('locale')
  },
  methods: {
    gobacks() {
      let id = this.$route.params.id;
      this.axios({
        methods: "get",
        url: "/api/product/" + id
      })
        .then(res => {
          if(this.lang==="de"){
            this.name = res.data[0].product_name_de;
            this.name_content =res.data[0].product_content_de ;
           }
          if(this.lang==="zh"){
            this.name = res.data[0].product_name_zh;
            this.name_content = res.data[0].product_content_zh;
          }
          if(this.lang==="en"){
            this.name = res.data[0].product_name_en;
            this.name_content = res.data[0].product_content_en;
          }
          this.img=res.data[0].product_image
          this.is=res.data[0].isproduct
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
