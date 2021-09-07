<template>
  <div class="relative inline-block w-full text-gray-700">
    <select
      class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
      placeholder="Regular input"
      v-model="selected"
    >
      <option v-for="item in items" :value="item.key">{{ item.label }}</option>
    </select>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
  props: {
    defaultSelected:{
      default: 1,
    },
    items: {      
      default: [
        {
          key: 1,
          label: "選項一",
        },
        {
          key: 2,
          label: "選項二",
        },
        {
          key: 3,
          label: "選項三",
        },
      ],
    },
  },
  components: {},
  data() {
    return {
      selected: this.defaultSelected,
    };
  },
  created: function () {},
  computed: {},
  watch: {
    selected(value) {
      let selectItem = this.items.find((x) => x.key == value);
      this.$emit("changeSelect", selectItem);
    },
    defaultSelected(value){
      this.selected = value;
    }
  },
  methods: {},
};
</script>

<style scoped></style>
