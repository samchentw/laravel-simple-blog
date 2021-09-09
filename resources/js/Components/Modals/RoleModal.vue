<template>
  <div>
    <button
      class="bg-blue-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
      type="button"
      v-on:click="toggleModal()"
      v-if="!id"
      target="_blank"
      href="/export-file/excel/subscription"
    >
      <i class="fas fa-plus"></i>建立角色
    </button>

    <a href="javascript:void(0);" v-on:click="openModel()" v-if="id" class="text-sm">
      編輯
    </a>

    <div
      v-if="showModal"
      class="overflow-x-hidden text-left overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center flex"
    >
      <div class="relative w-auto my-6 mx-auto max-w-4xl">
        <!--content-->
        <div
          class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
        >
          <!--header-->
          <div
            class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
          >
            <h4 class="font-semibold">
              <span v-if="id">編輯角色</span>
              <span v-if="!id">建立角色</span>
            </h4>
            <button
              class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
              v-on:click="toggleModal()"
            >
              <span
                class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"
              >
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto w-full">
            <div class="relative flex w-full flex-wrap items-stretch mb-3">
              <!-- form -->
              <form class="w-full max-w-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3 mb-6 md:mb-0">
                    <label
                      class="block uppercase tracking-wide text-base font-bold mb-2"
                      
                    >
                      名稱
                    </label>
                    <!--  border border-red-500 -->
                    <input
                      class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                      id="grid-first-name"
                      type="text"
                      placeholder="名稱"
                      v-model="form.name"
                    />
                    <!-- <p class="text-red-500 text-base italic">Please fill out this field.</p> -->
                  </div>
                  <div class="w-full px-3">
                    <label
                      class="block uppercase tracking-wide text-base font-bold mb-2"
                      for="grid-last-name"
                    >
                      敘述
                    </label>
                    <textarea
                      class="resize-y appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                      placeholder="敘述"
                      v-model="form.description"
                    ></textarea>
                  </div>

                  <!-- toggle -->

                  <div class="w-full px-3">
                    <div
                      class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in"
                    >
                      <input
                        v-model="form.is_default"
                        type="checkbox"
                        name="toggle"
                        id="toggle"
                        class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                      />
                      <label
                        for="toggle"
                        class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
                      ></label>
                    </div>
                    <label
                      for="toggle"
                      class="uppercase tracking-wide text-base font-bold mb-2"
                      >是否為預設</label
                    >
                  </div>

                  <div class="w-full px-3 mt-3">
                    <!-- <span class="ml-5" v-for="p in permissions">{{ p.label }}</span> -->

                    <div class="inline">
                      <span class="uppercase tracking-wide text-base font-bold mb-2"
                        >權限</span
                      >

                      <div class="space-x-4 mb-3" v-for="groupKey in groupKeys">
                        <div> <span class="text-red-500">*</span> {{groupKey}}</div>
                        
                        <div
                          class="inline-block ml-4"
                          v-for="p in group[groupKey]"
                          v-bind:key="p.key"
                        >
                          <label class="inline-flex items-center">
                            <input
                              type="checkbox"
                              class="form-checkbox"
                              v-model="form.permissions"
                              :value="p.key"
                            />
                            <span class="ml-2 text-base">{{ p.label }}</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--footer-->
          <div
            class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
          >
            <button
              class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="createRole()"
              v-if="!id"
            >
              建立
            </button>

            <button
              class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="updateRole()"
              v-if="id"
            >
              更新
            </button>

            <button
              class="bg-red-500 text-white background-transparent font-bold uppercase px-6 py-3 text-sm rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="toggleModal()"
            >
              關閉
            </button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
  </div>
</template>

<script>

export default {
  props: {
    id: {
      default: "",
    },
  },
  name: "regular-modal",
  data() {
    return {
      showModal: false,
      permissions: [],
      form: {
        name: "",
        description: "",
        permissions: [],
        is_default: false,
      },
      group:[],
      groupKeys:[],
    };
  },
  created: function () {},
  watch: {},
  methods: {
    openModel() {
      this.showModal = true;
      this.getPermission();
      axios.get("/api/role/" + this.id).then((x) => {
        this.form = x.data;
      });
    },
    resetForm() {
      this.form = {
        name: "",
        description: "",
        permissions: [],
        is_default: false,
      };
    },
    toggleModal: function () {
      this.resetForm();
      this.getPermission();
      this.showModal = !this.showModal;
    },
    updateRole() {
      axios
        .put("/api/role/" + this.id, this.form)
        .then((x) => {
          common.successAlert("修改成功!");
          this.$emit("refresh");
        })
        .catch((error) => {
          common.errorMessage(error);
        })
        .finally(() => {
          this.showModal = !this.showModal;
        });
    },
    createRole() {
      axios
        .post("/api/role", this.form)
        .then((x) => {
          common.successAlert("建立成功!");
          this.$emit("refresh");
        })
        .catch((error) => {
          common.errorMessage(error);
        })
        .finally(() => {
          this.showModal = false;
        });
    },
    getPermission() {
      axios.get("/api/role/get-all-permission").then((response) => {
        this.permissions = response.data.permissions;
        this.group = response.data.groups;
        this.groupKeys = Object.keys(this.group);
        
      });
    },
  },
};
</script>

<style scope>
/* CHECKBOX TOGGLE SWITCH */
/* @apply rules for documentation, these do not work as inline style */
.toggle-checkbox:checked {
  /* @apply: right-0 border-green-400; */
  right: 0;
  border-color: #68d391;
}
.toggle-checkbox:checked + .toggle-label {
  /* @apply: bg-green-400; */
  background-color: #68d391;
}
</style>
