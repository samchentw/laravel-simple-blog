<template>
  <div class="flex w-full">
    <label
      class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white"
    >
      <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
        />
      </svg>
      <span class="mt-2 text-base leading-normal">請選擇檔案(多選)</span>
      <input
        type="file"
        class="hidden"
        accept="image/png, image/gif, image/jpeg"
        multiple
        @change="onFileChange"
      />
    </label>
  </div>

  <div v-if="files.length > 0">你選擇了 {{ files.length }}個圖檔, <a class="text-blue-500 cursor-pointer" v-on:click="removeFile()">重置</a></div>
  <div v-if="files.length == 0">目前尚未選擇圖片</div>
</template>
<script>
export default {
  props: [],
  components: {},
  data() {
    return {
      files: [],
    };
  },
  created: function () {},
  computed: {},
  emits: ["selectImage"],
  watch: {},
  methods: {
    onFileChange(event) {
      this.files = event.target.files;
      this.$emit("selectImage", this.files);
    },
    removeFile() {
      this.files = [];
      this.$emit("selectImage", []);
    },
  },
};
</script>
