<style>
.com-news {
  width: 1300px;
  margin: 50px auto;
}
.el-pagination {
  float: right;
  margin-top: 20px;
}
.news-time {
  float: right;
  margin-right: 20px;
}
.News-title {
  text-indent: 2em;
  line-height: 40px;
}
.new-content {
  text-indent: 2em;
  line-height: 30px;
  display: -webkit-box;
  word-break: break-all;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: pre-line;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
}
/* .new-content p {
  line-height: 30px;
        display: -webkit-box;
    word-break: break-all;
    text-overflow:ellipsis;
    overflow: hidden;
    white-space: pre-line;
    -webkit-box-orient: vertical;
    -webkit-line-clamp:2;
} */
.commpany-news {
  border-bottom: 1px dotted #dddddd;
  padding: 10px;
}
.news-pictor {
  width: 1300px;
  height: 280px;
  margin-bottom: 30px;
}
.company-header {
  border-bottom: #333 1px dotted;
  padding: 12px;
  font-size: 30px;
  margin-bottom: 30px;
}
.company-position {
  float: right;
  font-size: 16px;
  padding-top: 16px;
}
.News-title a {
  font-size: 20px;
  font-weight: bolder;
}
.com-news .el-tabs__item {
  height: 78px;
  line-height: 78px;
}
.el-tabs--left .el-tabs__header.is-left {
  width: 139px;
}
</style>

<template>
<div class="com-news">
    <img class="news-pictor" src="images/news.jpg">
    <div class="company-header"> {{$t("journalism.News")}}<span class="company-position">{{$t("journalism.position")}}-><a href=""> {{$t("journalism.News")}}</a></span></div>
   <el-tabs :tab-position="tabPosition" style="height: 900px;" @tab-click="handleClick">
    <el-tab-pane :label="$t('journalism.all')">
        <ul  class="commpany-news" v-for="(item,index) in journalismall" :key="index">
            <li v-if="$i18n.locale == 'zh'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titlezh }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contentzh" class="new-content">{{ item.contentzh }}</div> -->
            </li>
             <li v-if="$i18n.locale == 'de'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titlede }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contentde" class="new-content">{{ item.contentde }}</div> -->
            </li>
             <li v-if="$i18n.locale == 'en'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titleen }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contenten" class="new-content">{{ item.contenten }}</div> -->
            </li>
        </ul>
         <el-pagination
                 background
                 layout="prev, pager, next"
                 :page-size="pageSize"
                 @current-change="handleCurrentChange"
                 :current-page.sync ="currentPage"
                 :total="totalCountall">
            </el-pagination>
    </el-tab-pane>
    <el-tab-pane :label="$t('journalism.company')">
         <ul  class="commpany-news" v-for="(item,index) in journalismhy" :key="index">
            <li v-if="$i18n.locale == 'zh'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titlezh }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contentzh" class="new-content">{{ item.contentzh }}</div> -->
            </li>
             <li v-if="$i18n.locale == 'de'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titlede }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contentde" class="new-content">{{ item.contentde }}</div> -->
            </li>
             <li v-if="$i18n.locale == 'en'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titleen }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contenten" class="new-content">{{ item.contenten }}</div> -->
            </li>
        </ul>
        <el-pagination
                 background
                 layout="prev, pager, next"
                 :page-size="pageSize"
                 @current-change="handleCurrentChange"
                 :current-page.sync ="currentPage"
                 :total="totalCounthy">
            </el-pagination>
    </el-tab-pane>
    <el-tab-pane :label="$t('journalism.information')">
         <ul  class="commpany-news" v-for="(item,index) in journalismzx" :key="index">
            <li v-if="$i18n.locale == 'zh'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titlezh }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contentzh" class="new-content">{{ item.contentzh }}</div> -->
            </li>
             <li v-if="$i18n.locale == 'de'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titlede }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contentde" class="new-content">{{ item.contentde }}</div> -->
            </li>
             <li v-if="$i18n.locale == 'en'" >
                    <div class="News-title" ><router-link target="_blank" :to="{ name: 'new' ,params: { id: item.id  } }">{{ item.titleen }}</router-link> <span class="news-time">{{ item.time.substring(0,10) }}</span>
                    </div>
                <!-- <div v-html="item.contenten" class="new-content">{{ item.contenten }}</div> -->
            </li>
        </ul>
         <el-pagination
                 background
                 layout="prev, pager, next"
                 :page-size="pageSize"
                 @current-change="handleCurrentChange"
                 :current-page.sync ="currentPage"
                 :total="totalCountzx">
            </el-pagination>
    </el-tab-pane>
  </el-tabs>
</div>
</template>
<script>
export default {
  data() {
    return {
      tabPosition: "left",
      journalismall: "",
      totalCountall: 0,
      journalismhy: "",
      totalCounthy: 0,
      journalismzx: "",
      totalCountzx: 0,
      pageSize: 13,
      currentPage: 1
    };
  },
  created() {
    this.goback();
  },
  methods: {
    handleCurrentChange(pageIndex = 1) {
      this.goback(pageIndex);
    },
    handleClick(pageIndex = 1) {
      this.goback((pageIndex = 1));
      this.currentPage = 1;
    },
    goback(page) {
      this.axios({
        methods: "get",
        params: {
          page
        },
        url: "/api/new"
      })
        .then(res => {
          this.journalismall = res.data[0].data;
          this.totalCountall = res.data[0].total;
          this.journalismhy = res.data[1].data;
          this.totalCounthy = res.data[1].total;
          this.journalismzx = res.data[2].data;
          this.totalCountzx = res.data[2].total;
          console.log();
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>


