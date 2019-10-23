<template>
    <vue-seamless-scroll :data="newsList" :class-option="optionLeft" class="seamless-warp2">
        <ul class="item" >
            <li v-for="(item,index) in newsList"  :key="index" >
               <img :src="item.src">
            </li>
        </ul>
    </vue-seamless-scroll>
</template>
<style lang="scss" scoped>
.seamless-warp2 {
  overflow: hidden;
  height: 304px;
  width: 1225px;
  float: left;
  padding-top: 84px;
  ul.item {
    width: 1300px;
    display: flex;
    justify-content: space-around;
    flex-wrap: nowrap;
    li {
      float: left;
      width:18%;
      list-style: none;
    }
    img {
      width: 100%;
        height: 200px;
    }
  }
}
</style>
<script>
export default {
  data() {
    return {
      newsList: [
        {
          src: "images/img1.png"
        },
        {
          src: "images/img2.png"
        },
        {
          src: "images/img3.png"
        },
        {
          src: "images/img4.png"
        },
        {
          src: "images/img5.png"
        }
      ]
    };
  },
  computed: {
    optionLeft() {
      return {
        step: .9,
        direction: 2,
        limitMoveNum: 4
      };
    }
  }
};
</script>
