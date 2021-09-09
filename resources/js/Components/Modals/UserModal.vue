<template>
  <div>
    <button
      class="bg-blue-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
      type="button"
      v-on:click="openModel()"
      v-if="!id"
    >
      建立使用者
    </button>

    <a
      href="javascript:void(0)"
      v-on:click="openModel()"
      v-if="id"
      class="text-indigo-600 hover:text-indigo-900"
      >編輯</a
    >

    <div
      v-if="showModal"
      class="overflow-x-hidden text-left overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center flex"
    >
      <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div
          class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
        >
          <!--header-->
          <div
            class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
          >
            <h3 class="text-xl font-semibold">
              <span v-if="!id">建立使用者</span>
              <span v-if="id">修改使用者</span>
            </h3>
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
                        帳號
                      </label>
                      <span v-if="id">{{ form.account }}</span>
                      <input
                        class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="text"
                        placeholder="帳號"
                        v-model="form.account"
                        v-if="!id"
                      />
                    </div>

                    <div class="w-full px-3 mb-6 md:mb-0">
                      <label
                        class="block uppercase tracking-wide text-base font-bold mb-2"
                        for="grid-first-name"
                      >
                        名稱
                      </label>
                      <input
                        class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="text"
                        placeholder="名稱"
                        v-model="form.name"
                      />
                    </div>

                    <div class="w-full px-3 mb-6 md:mb-0">
                      <label
                        class="block uppercase tracking-wide text-base font-bold mb-2"
                        for="grid-first-name"
                      >
                        信箱
                      </label>
                      <span v-if="id">{{ form.email }}</span>
                      <input
                        class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="email"
                        placeholder="信箱"
                        v-model="form.email"
                        v-if="!id"
                      />
                    </div>

                    <div class="w-full px-3 mb-6 md:mb-0" v-if="!id">
                      <label
                        class="block uppercase tracking-wide text-base font-bold mb-2"
                        for="grid-first-name"
                      >
                        密碼
                      </label>
                      <input
                        class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="password"
                        placeholder="密碼"
                        v-model="form.password"
                      />
                    </div>

                    <div class="w-full px-3 mb-6 md:mb-0" v-if="!id">
                      <label
                        class="block uppercase tracking-wide text-base font-bold mb-2"
                        for="grid-first-name"
                      >
                        確認密碼
                      </label>
                      <input
                        class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="password"
                        placeholder="確認密碼"
                        v-model="form.password_confirmation"
                      />
                    </div>

                    <div class="w-full px-3 mt-3">
                      <!-- <span class="ml-5" v-for="p in permissions">{{ p.label }}</span> -->

                      <div class="inline">
                        <span class="uppercase tracking-wide text-base font-bold mb-2"
                          >角色</span
                        >

                        <div class="space-x-4">
                          <div
                            class="inline-block ml-4"
                            v-for="p in roles"
                             v-bind:key="p.id"
                            
                          >
                            <label class="inline-flex items-center">
                              <input
                                type="checkbox"
                                class="form-checkbox"
                                 :value="p.id"
                                v-model="form.role_ids"
                              />
                              <span class="ml-2 text-base">{{ p.name }}</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--  -->
                  </div>
                </form>
                <!-- form -->
             
            </div>
          </div>
          <!--footer-->
          <div
            class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
          >
            <button
              class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="createUser()"
              v-if="!id"
            >
              建立
            </button>
            <button
              class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
              v-on:click="updateUser()"
              v-if="id"
            >
              修改
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
  data() {
    return {
      showModal: false,
      roles: [],
      form: {
        role_ids: [],
      },
    };
  },
  methods: {
    resetForm() {
      this.form = {
        role_ids: [],
      };
    },
    toggleModal: function () {
      this.showModal = false;
    },
    openModel() {
      this.showModal = true;
      axios.get("/api/role").then((x) => {
        this.roles = x.data;
        if (this.id) {
          axios.get("/api/user/" + this.id).then((x) => {
            this.form = x.data;
            this.form.role_ids = x.data.roles.map((m) => m.id);
          });
        }
      });
    },
    createUser() {
      axios
        .post("/api/user", this.form)
        .then((x) => {
          common.successAlert("建立成功!");
          this.$emit("refresh");
        })
        .catch((error) => {
          common.errorMessage(error);
        })
        .finally(() => {
          this.showModal = false;
          this.resetForm();
        });
    },
    updateUser() {
      axios
        .put("/api/user/" + this.id, this.form)
        .then((x) => {
          common.successAlert("修改成功!");
          this.$emit("refresh");
        })
        .catch((error) => {
          common.errorMessage(error);
        })
        .finally(() => {
          this.showModal = false;
          this.resetForm();
        });
    },
  },
};
</script>
