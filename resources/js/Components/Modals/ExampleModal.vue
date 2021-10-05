<template>
  <span>
    <button
      class="bg-blue-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
      type="button"
      v-on:click="openModal()"
    >
      <i class="fas fa-plus"></i>新增  
    </button>
    <div
      v-if="showModal"
      class="overflow-x-hidden text-left overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center flex"
    >
      <div :class="dict[width]">
        <!--content-->
        <div
          class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
        >
          <!--header-->
          <div
            class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
          >
            <h3 class="text-xl font-semibold">
              <span v-if="!id">建立</span>
              <span v-if="id">編輯</span>
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
            <form class="w-ful">
              <div class="flex flex-wrap -mx-3 mb-6">
                <!-- 內容在這 -->
                <div class="w-full">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    名稱
                  </label>

                  <input
                    class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-first-name"
                    type="text"
                    placeholder="名稱"
                    v-model="form.name"
                  />
                  <!-- <p class="text-red-500 text-base italic">Please fill out this field.</p> -->
                </div>
              </div>
            </form>
          </div>
          <!--footer-->
          <div
            class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
          >
            <button
              class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
            >
              建立
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
  </span>
</template>

<script>
export default {
  props: {
    id: {},
    width: {
      default: "short",
      validator: function (value) {
        return ["short", "medium", "long"].indexOf(value) !== -1;
      },
    },
  },
  data() {
    return {
      showModal: false,
      form: {},
      dict: {
        short: "relative w-auto my-6 mx-auto max-w-sm",
        medium: "relative w-full my-6 mx-auto max-w-3xl",
        long: "relative w-full my-6 mx-auto max-w-6xl",
      },
    };
  },
  created() {},
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
