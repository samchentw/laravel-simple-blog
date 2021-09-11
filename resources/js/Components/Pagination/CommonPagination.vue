<template>
  <div class="pagination">
    <a href="javascript:void(0)" v-on:click="goRoute(1)">&laquo;</a>
    <a href="javascript:void(0)" :class="(currentPath==pageNumber)?'active':''" v-for="(pageNumber) in pageCount" v-on:click="goRoute(pageNumber)">{{pageNumber}}</a>
    <a href="javascript:void(0)" v-on:click="goRoute(pageCount)">&raquo;</a>
  </div>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
export default {
  props: {
    currentPath: {
      default: 0,
    },
    pageCount: {
      default: 0,
    },
    urlPath: {
      default: "",
    },
  },
  components: {},
  data() {
    return {};
  },
  created: function () {},
  computed: {
   
  },
  watch: {},
  methods: {
    goRoute(page) {
      Inertia.visit(this.urlPath+"?page=" + page, {
        method: "get",
        preserveScroll: true
      });
    },
  },
};
</script>

<style scoped>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4caf50;
  color: white;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
}
</style>
