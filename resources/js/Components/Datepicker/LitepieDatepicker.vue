<template>
  <litepie-datepicker
    i18n="zh-tw"
    :formatter="formatter"
    as-single
    v-model="dateValue"
    disabled
  ></litepie-datepicker>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import LitepieDatepicker from "litepie-datepicker";
import { ref } from "vue";

export default {
  props: {
    defaultValue: {},
    formatter: {
      default: "YYYY-MM-DD",
    },
  },
  setup(props) {
    return {
      formatter: {
        date: props.formatter,
      },
      dateValue: ref([props.defaultValue]),
    };
  },
  components: {
    LitepieDatepicker,
  },
  data() {
    return {};
  },
  created: function () {},
  computed: {},
  watch: {
    dateValue(value) {
      let keys = Object.keys(value);
      if (keys.length > 0) {
        this.$emit("change", value[0]);
      } else this.$emit("change", "");
    },
  },
  methods: {},
};
</script>

<style scoped></style>
