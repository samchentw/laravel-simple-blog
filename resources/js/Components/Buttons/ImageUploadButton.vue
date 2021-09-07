<template>
  <!-- file select -->
  <div class="flex w-full" v-if="!url">
    <label
      class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white"
    >
      <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
        />
      </svg>
      <span class="mt-2 text-base leading-normal">請選擇檔案</span>
      <input
        type="file"
        class="hidden"
        accept="image/png, image/gif, image/jpeg"
        @change="onFileChange"
      />
    </label>
  </div>

  <div v-if="url">
    <div id="preview">
      <img v-if="url" :src="url" />
      <div class="topright">
    
        <svg
          class="fill-current h-6 w-6 text-white bg-red-500"
          role="button"
          viewBox="0 0 20 20"
          v-on:click="removeFile()"
        >
          <title>移除圖片</title>
          <path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
          />
        </svg>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["oldImageUrl"],
  components: {},
  data() {
    return {
      file: null,
      url: this.oldImageUrl,
    };
  },
  created: function () {},
  computed: {},
  emits: ["selectImage"],
  watch: {
    oldImageUrl(value) {
      if (!value) return;
      this.url = value;
    },
  },
  methods: {
    onFileChange(event) {
      var fileData = event.target.files[0];
      this.file = fileData;
      this.url = URL.createObjectURL(fileData);
      this.$emit("selectImage", this.file);
    },
    removeFile() {
      this.file = null;
      this.url = "";
      this.$emit("selectImage", null);
    },
  },
};
</script>

<style scoped>
#preview {
  /* display: flex;
  justify-content: center;
  align-items: center; */
  position: relative;
}

/* #preview img {
  max-width: 300px;
  max-height: 300px;
} */

.topright {
  position: absolute;
  top: 8px;
  right: 16px;
  font-size: 18px;
}

img {
  width: 100%;
  /* height: auto; */
  max-height: 300px;
  /* opacity: 0.3; */
  border: 1px solid #ddd;
  border-radius: 4px;
}
</style>
