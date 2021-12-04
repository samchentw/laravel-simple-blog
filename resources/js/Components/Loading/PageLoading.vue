<template>
  <div
    v-if="currentLoading"
    class="overflow-x-hidden text-left overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center flex"
  >
    <div
      class="ml-4 mt-64 loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-16 w-16"
    
    ></div>
    <h2
      class="mt-80 text-center text-white text-xl font-semibold"
      style="margin-left: -60px"
    >
      {{ currentLabel }}
    </h2>
    
  </div>
   <div v-if="loading" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</template>

<script>
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
