<template>
  <editor
    v-model="editHtml"
    :api-key="tinymceApiKey"
    :init="{
      path_absolute: '/',
      height: height,
      selector: 'textarea.editor',
      language: 'zh_TW',
      plugins: [
        'advlist autolink lists link image charmap hr wordcount code media table emoticons',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount',
      ],
      toolbar:
        'insertfile | undo redo | formatselect | bold italic strikethrough forecolor backcolor  | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | link image media | removeformat | help',

      relative_urls: false,
      // 右下tinyMce超連結
      branding: false,
      color_cols: 6,
      custom_colors: false,
      color_map: [
        '#BFEDD2',
        'Light Green',
        '#FBEEB8',
        'Light Yellow',
        '#F8CAC6',
        'Light Red',
        '#ECCAFA',
        'Light Purple',
        '#C2E0F4',
        'Light Blue',

        '#2DC26B',
        'Green',
        '#F1C40F',
        'Yellow',
        '#E03E2D',
        'Red',
        '#B96AD9',
        'Purple',
        '#3598DB',
        'Blue',

        '#169179',
        'Dark Turquoise',
        '#E67E23',
        'Orange',
        '#BA372A',
        'Dark Red',
        '#843FA1',
        'Dark Purple',
        '#236FA1',
        'Dark Blue',

        '#ECF0F1',
        'Light Gray',
        '#CED4D9',
        'Medium Gray',
        '#95A5A6',
        'Gray',
        '#7E8C8D',
        'Dark Gray',
        '#34495E',
        'Navy Blue',

        '#000000',
        'Black',
        '#ffffff',
        'White',
        '#8ec31e',
        '8ec31e',
        '#036eb8',
        '036eb8',
        '#0c4679',
        '0c4679',
        '#0ca2b9',
        '0ca2b9',
      ],
      automatic_uploads: true,
      images_upload_handler: uploadImage,
      file_picker_callback: uploadFile,
    }"
  />
</template>
<script>
/**
 * @see https://www.npmjs.com/package/@tinymce/tinymce-vue?activeTab=versions
 */
import Editor from "@tinymce/tinymce-vue";

export default {
  props: {
    tinymceApiKey: { default: "" },
    text: { default: "" },
    height: { default: 500 },
  },
  emits: ["changeHtml"],
  components: {
    Editor,
  },
  data() {
    return {
      editHtml: this.text,
    };
  },
  created: function () {},
  watch: {
    text(val) {
      this.editHtml = val;
    },
    editHtml(val) {
      this.$emit("changeHtml", val);
    },
  },
  methods: {
    uploadFile(cb, value, meta) {
      var input = document.createElement("input");
      input.setAttribute("type", "file");
      input.onchange = function () {
        var file = this.files[0];
        var reader = new FileReader();

        // FormData
        var formData = new FormData();
        var files = file;
        formData.append("file", files);
        formData.append("folder", "tinymce");
        axios
          .post("/api/file/upload-file", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((x) => {
            cb(x.data.file_path, { text: x.data.file_name });
            return;
          })
          .catch((error) => {
            common.errorMessage(error);
          });
      };
      input.click();
    },
    uploadImage(blobInfo, success, failure) {
      if (!blobInfo) return;
      let formData = new FormData();
      formData.append("image", blobInfo.blob());
      formData.append("folder", "tinymce");
      axios
        .post("/api/file/upload-image", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((x) => {
          success(x.data.file_path);
        })
        .catch((error) => {
          common.errorMessage(error);
        });
    },
  },
};
</script>

<style scoped></style>
