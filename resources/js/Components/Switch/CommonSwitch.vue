<template>
  <div
    class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in"
  >
    <input
      v-model="enable"
      type="checkbox"
      :id="'toggle'+newId"
      class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
    />
    <label
      :for="'toggle'+newId"
      class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
    ></label>
  </div>
  <label :for="'toggle'+newId" class="tracking-wide text-base font-bold mb-2">{{
    label
  }}</label>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
  props: {
    defaultValue: {
      default: false,
    },
    label: {
      default: "是否啟用",
    },
  },
  components: {},
  data() {
    return {
      newId: Math.floor(Math.random() * 1000)+this.label,
      enable: this.defaultValue,
    };
  },
  emits: ["changeValue"],
  created: function () {},
  computed: {},
  watch: {
    enable(value) {
      this.$emit("changeValue", value);
    },
    defaultValue(value){
      this.enable = value;
    }
  },
  methods: {},
};
</script>

<style scope>
.toggle-checkbox:checked {
  right: 0;
  border-color: #68d391;
}
.toggle-checkbox:checked + .toggle-label {
  background-color: #68d391;
}
</style>
