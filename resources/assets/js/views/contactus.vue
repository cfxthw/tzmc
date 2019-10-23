<style>
.contactus-body {
  width: 1300px;
  margin: 0 auto;
  padding-top: 45px;
}
.contactus-title {
  padding-left: 75px;
  font-size: 37px;
  font-weight: 400;
}
.contactus-content {
  padding-left: 75px;
  padding-top: 40px;
}
.contactus-mode {
  height: 500px;
  width: 100%;
  margin-right: 65px;
}
.contactus-mode p {
  font-size: 14px;
  color: #666;
  line-height: 40px;
}
.contactus-address {
  float: left;
  height: 500px;
  width: 100%;
}
.contactus-phone {
  margin-top: 40px;
}
.contactus-mode-address {
  margin-top: 40px;
}
.contactus-mode img {
  height: 50px;
}
.wzxinxi{
    margin-top: 30px;
    height: 260px;
    margin-bottom: 30px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding-left: 75px;
}
.wzxinxi div{
    width: 24.8%;
    height: 77%;
    border-left: 1px solid #d3d3d3;
}
.wzxinxi img{
    display: block;
    margin: 10px,auto;
    margin: 45px auto 0;
    width: 65px;
    height: 65px;
}
.wzxinxi span{
    text-align: center;
    display: block;
    margin-top: 18px;
}
</style>
<template>
        <div class="contactus-body">
            <div class="contactus-title">
                <p>{{ $t("contactus.Contactus")}}</p>
                <hr>
            </div>
            <div class="contactus-content">
                <div class="contactus-mode">
                    <!-- <div>
                        <img src="images/logo3.jpg" alt="">
                    </div> -->
                    <!-- <div class="contactus-email">
                        <p>qq：888888888</p>
                        <p>传真：888888888</p>
                        <p>邮箱：88888@qq.com</p>
                    </div> -->
                    <!-- <div class="contactus-phone">
                        <p>联系人：张小岩</p>
                        <p>商务部（国内）（86）0574 86748502</p>
                        <p>商务部（国际）（86）0574 86764358</p>
                        <p>技术部（86）0574 86748503</p>
                    </div>
                    <div class="contactus-mode-address">
                        <p>地铁：1号线</p>
                        <p>公交：768路->764路</p>
                        <p>地址：浙江省宁波市大榭开发区北渡路5号</p>
                    </div>
                </div> -->
                <div ref="map" class="contactus-address" id="map">
                </div>
            </div>
        </div>
               <div class="wzxinxi">
                <div style="border:none;">
                    <img src="images/公司地址.png" alt="">
                    <span>{{ $t("contactus.address")}}</span>
                    <span>{{ $t("contactus.companyaddress")}}</span>
                </div>
                <div>
                    <img src="images/公司电话.png" alt="">
                    <span>{{ $t("contactus.Mobile")}}</span>
                    <span>86765788</span>
                </div>
                <div>
                    <img src="images/传真.png" alt="">
                    <span>{{ $t("contactus.Fax")}}</span>
                    <span>86-0574-86763198</span>
                </div>
                <div>
                    <img src="images/邮箱.png" alt="">
                    <span>{{ $t("contactus.mailbox")}}</span>
                    <span>tony@tzmc.com</span>
                </div>
            </div>
        </div>
</template>

<script>
import AMapJS from "amap-js";
export default {
  mounted() {
    const aMapJSAPILoader = new AMapJS.AMapJSAPILoader({
      v: "1.4.12",
      key: "67211ffe27991bce6cff595c4c3062f7"
    });
    const aMapUILoader = new AMapJS.AMapUILoader({
      v: "1.0" // UI组件库版本号
    });
    aMapJSAPILoader.load().then(AMap => {
      aMapUILoader.load().then(initAMapUI => {
        const AMapUI = initAMapUI(); // 这里调用initAMapUI初始化并返回AMapUI
        // 其他逻辑
        console.log(AMap);
        console.log(AMapUI);
        var map = new AMap.Map(this.$refs.map, {
          zoom: 5,
          center: [115,30]
        });
        var marker = new AMap.Marker({
            //  position:[124,30],
          position: [121.93921, 29.9051],
          title: "天正模具",
          map: map
        });
      });
    });

    // 将创建的点标记添加到已有的地图实例：
  }
};
</script>
