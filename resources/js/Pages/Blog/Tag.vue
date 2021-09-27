<template>
   <AppLayout title="Tag">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tag</h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="container mb-6 pt-5 px-4 mx-auto">
          title
      </div>

      <div class="container mb-6 px-4 mx-auto">
          content
      </div>

     
    </div>
  </AppLayout>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: [],
  components: {
    AppLayout
  },
  data() {
    return {};
  },
  created: function () {},
  computed: {},
  watch: {},
  methods: {},
};
</script>

<style scoped></style>
