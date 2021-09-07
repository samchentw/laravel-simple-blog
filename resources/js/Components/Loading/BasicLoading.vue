<template>
  <div
    class="ml-16 mt-64 loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-16 w-16"
    v-if="currentLoading"
  ></div>
  <h2
    class="mt-80 text-center text-white text-xl font-semibold"
    style="margin-left: -60px"
    v-if="currentLoading"
  >
    {{currentLabel}}
  </h2>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
  props: {
    loading: {
      default: false,
    },
    label: {
      default: "test",
    },
  },
  components: {},
  data() {
    return {
      currentLoading: this.loading,
      currentLabel: this.label,
    };
  },
  created: function () {},
  computed: {},
  watch: {
    loading(val) {
      this.currentLoading = val;
    },
    label(val) {
      this.currentLabel = val;
    },
  },
  methods: {},
};
</script>

<style scoped>
.loader {
  border-top-color: #3498db;
  -webkit-animation: spinner 1.5s linear infinite;
  animation: spinner 1.5s linear infinite;
}

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}

@keyframes spinner {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
