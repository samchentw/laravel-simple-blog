<template>
  <div>
    <Sidebar />
    <div class="relative md:ml-64">
      <div class="relative bg-green-500 md:pt-12 pb-10 pt-12">
        <Narbar :title="title"> </Narbar>
      </div>

      <div class="px-4 bg-gray-200 md:px-10 mx-auto w-full -m-24 mt-0 min-h-screen">
        <div class="container mx-auto">
          <main>
            <slot></slot>
          </main>
        </div>
        <!-- <footer-admin /> -->
      </div>
    </div>

  </div>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
import Narbar from "@/components/Navbars/Narbar.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";

export default {
  props: [],
  components: {
    Sidebar,
    Narbar
  },
  data() {
    return {
      title:"測試頁"
    };
  },
  created: function () {},
  computed: {},
  watch: {},
  methods: {},
};
</script>

<style scoped></style>
