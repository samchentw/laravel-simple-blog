<template>
  <div
    v-if="havePermission"
    v-on:click="openModal()"
    class="lg:w-1/2 xl:w-1/4 mx-auto xl:mx-0 md:w-1/2 flex sm:mx-auto mb-6 items-center cursor-pointer"
  >
    <div class="h-16 w-20">
      <!-- icon -->
      <i :class="icon + ' text-5xl'"></i>
    </div>
    <div class="pt-3 pb-3 ml-2 pr-5">
      <p class="text-base text-indigo-700">{{ title }}</p>
      <p class="text-base text-gray-800">
        {{ description }}
      </p>
    </div>
  </div>

  <div
    v-if="showModal"
    class="overflow-x-hidden text-left overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center flex"
  >
    <BasicLoading :loading="loading"  label="更新中…" />
    <!-- relative w-full my-6 mx-auto max-w-6xl -->
    <div class="relative w-full my-6 mx-auto max-w-6xl" v-if="!loading">
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
          <form class="w-full">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3" v-for="item in settings">
                <span v-if="item.type == 'text'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>

                  <textarea
                    :placeholder="item.display_name"
                    v-model="item.value"
                    class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    rows="5"
                    cols="50"
                  >
                  </textarea>
                </span>

                <span v-if="item.type == 'string'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>
                  <input
                    class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="text"
                    :placeholder="item.display_name"
                    v-model="item.value"
                  />
                </span>

                <span v-if="item.type == 'password'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>
                  <input
                    class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="password"
                    :placeholder="item.display_name"
                    v-model="item.value"
                  />
                </span>

                <span v-if="item.type == 'html'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>
                  <tinymce-editor
                    :tinymceApiKey="tinymceApiKey"
                    height="300"
                    :text="item.value"
                    @changeHtml="item.value = $event"
                  ></tinymce-editor>
                </span>

                <span v-if="item.type == 'number'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>
                  <input
                    class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number"
                    :placeholder="item.display_name"
                    v-model="item.value"
                  />
                </span>

                <span v-if="item.type == 'date'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>
                  <div class="mb-3">
                    <litepie-datepicker
                      @change="item.value = $event"
                      :defaultValue="item.value"
                    />
                  </div>
                </span>

                <span v-if="item.type == 'date_time'">
                  <label class="block tracking-wide text-base font-bold mb-2">
                    {{ item.display_name }}
                  </label>
                  <div class="mb-3">
                    <litepie-datepicker
                      @change="item.value = $event"
                      :defaultValue="item.value.split(' ')[0]"
                    />
                  </div>

                  <input
                    class="appearance-none rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number"
                    placeholder="點"
                    min="0"
                    max="24"
                    v-model="item.hour"
                  />
                  點

                  <input
                    class="appearance-none rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number"
                    min="0"
                    max="59"
                    placeholder="分"
                    v-model="item.minute"
                  />分
                </span>

                <span v-if="item.type == 'boolean'">
                  <div class="mb-3">
                    <common-switch
                      :defaultValue="item.value"
                      :label="item.display_name"
                      @changeValue="item.value = $event"
                    />
                  </div>
                </span>
              </div>
            </div>
          </form>
        </div>
        <!--footer-->
        <div
          class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
        >
          <button
            class="bg-green-500 text-white active:bg-green-600 font-bold text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button"
            v-on:click="save()"
          >
            確認
          </button>

          <button
            class="bg-red-500 text-white background-transparent font-bold px-6 py-3 text-sm rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
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
import TinymceEditor from "@/Components/Editor/TinymceEditor";
import CommonSwitch from "@/Components/Switch/CommonSwitch";
import BasicLoading from '@/Components/Loading/BasicLoading';
import LitepieDatepicker from "@/Components/Datepicker/LitepieDatepicker";

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
    apiUrl: {
      default: "",
    },
    tinymceApiKey: {
      default: "",
    },
    permission: {
      default: "",
    },
  },
  data() {
    return {
      showModal: false,
      settings: [],
      isArray: true,
      loading: false,
      havePermission:
        this.$page.props.permission.includes(this.permission) || this.permission == "",
    };
  },
  components: {
    TinymceEditor,
    CommonSwitch,
    LitepieDatepicker,
    BasicLoading,
  },
  methods: {
    openModal() {
      this.showModal = true;
      axios.get(this.apiUrl).then((x) => {
        if (!Array.isArray(x.data)) {
          this.isArray = false;
          this.settings = [x.data];
        } else {
          this.settings = x.data;
          this.isArray = true;
        }

        for (let setting of this.settings) {
          if (setting.type == "date_time") {
            setting.hour = new Date(setting.value).getHours();
            setting.minute = new Date(setting.value).getMinutes();
          }
        }
      });
    },
    closeModal() {
      this.showModal = false;
      this.settings = [];
    },
    save() {
      this.loading = true;
      let input;
      for (let setting of this.settings) {
        if (setting.type == "date_time") {
          setting.value = new Date(setting.value);
          setting.value.setHours(setting.hour);
          setting.value.setMinutes(setting.minute);
          setting.value = moment(setting.value).format("YYYY-MM-DD HH:mm:ss");
        }
      }
      input = { group: this.settings };
      if (!this.isArray) {
        input = _.head(this.settings);
      }

      axios
        .put(this.apiUrl, input)
        .then((x) => {
          this.closeModal();
          common.successAlert("修改成功!");
        })
        .catch((error) => {
          common.errorMessage(error);
        })
        .finally(() => {
          this.loading = false;
        });
    },
  },
};
</script>
