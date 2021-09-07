<template>
  <a ref="btnRef" v-on:mouseenter="toggleTooltip()" v-on:mouseleave="toggleTooltip()">
    <i class="fas fa-question-circle"></i>
  </a>

  <div
    ref="tooltipRef"
    v-bind:class="{ hidden: !tooltipShow, block: tooltipShow }"
    class="bg-black border-0 ml-3 block z-50 font-normal leading-normal text-sm max-w-xs text-left no-underline break-words rounded-lg"
  >
    <div>
      <div
        class="bg-black text-white font-semibold p-3 mb-0 border-b border-solid border-blueGray-100 uppercase rounded-t-lg"
      >
        {{ title }}
      </div>
      <div class="text-white p-3">
        <span v-html="description"></span>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { createPopper } from "@popperjs/core";

export default {
  props: {
    title: {
      default: "說明",
    },
    description: {
      default: "這是一個範例！！",
    },
    position: {
      default: "right",
      validator: function (value) {
        return ["right", "left", "top", "bottom"].indexOf(value) !== -1;
      },
    },
  },
  components: {
    createPopper,
  },
  data() {
    return {
      tooltipShow: false,
    };
  },
  created: function () {},
  computed: {},
  watch: {},
  methods: {
    toggleTooltip: function () {
      if (this.tooltipShow) {
        this.tooltipShow = false;
      } else {
        this.tooltipShow = true;
        createPopper(this.$refs.btnRef, this.$refs.tooltipRef, {
          placement: this.position,
        });
      }
    },
  },
};
</script>

<style scoped></style>
