<template>
  <div
    v-on:click="openModal()"
    class="lg:w-1/2 xl:w-1/4 mx-auto xl:mx-0 md:w-1/2 flex sm:mx-auto mb-6 items-center cursor-pointer"
  >
    <div class="h-16 w-20">
      <!-- icon -->
      <i :class="icon + ' text-5xl'"></i>
    </div>
    <div class="pt-3 pb-3 ml-2 pr-5">
      <p class="uppercase text-base text-indigo-700">{{ title }}</p>
      <p class="text-base text-gray-800">
        {{ description }}
      </p>
    </div>
  </div>

  <div
    v-if="showModal"
    class="overflow-x-hidden text-left overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center flex"
  >
    <!-- relative w-full my-6 mx-auto max-w-6xl -->
    <div class="relative w-auto my-6 mx-auto max-w-sm">
      <!--content-->
      <div
        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
      >
        <!--header-->
        <div
          class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
        >
          <h3 class="text-xl font-semibold">
            {{ title }}
          </h3>
          <button
            class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
            v-on:click="closeModal()"
          >
            <span
              class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"
            >
              ×
            </span>
          </button>
        </div>
        <!--body-->
        <div class="relative p-6 flex-auto">
          <!-- 內容在這 -->
        </div>
        <!--footer-->
        <div
          class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
        >
          <button
            class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button"
          >
            確認
          </button>

          <button
            class="bg-red-500 text-white background-transparent font-bold uppercase px-6 py-3 text-sm rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button"
            v-on:click="closeModal()"
          >
            關閉
          </button>
        </div>
      </div>
    </div>
  </div>
  <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</template>

<script>
export default {
  props: {
    title: {
      default: "範例標題",
    },
    description: {
      default: "範例敘述",
    },
    icon: {
      default: "fas fa-toolbox",
    },
  },
  data() {
    return {
      showModal: false,
      form: {},
    };
  },
  components: {},
  methods: {
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
  },
};
</script>
