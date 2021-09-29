<template>
  <AppLayout title="Post">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Post</h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="container mb-6 pt-5 px-4 mx-auto">title</div>

      <div class="container mb-6 px-4 mx-auto">
        <table>
          <tr>
            <th>標題</th>
            <th>建立時間</th>
            <th>修改時間</th>
            <th></th>
          </tr>
          <tr v-for="data in datas">
            <td>{{ data.title }}</td>
            <td>{{ data.created_at }}</td>
            <td>{{ data.updated_at }}</td>
            <td>
              <div class="space-x-4">
                <div class="inline-block">
                  <!-- <RoleModal :id="role.id" @refresh="refresh()" /> -->
                </div>

                <div class="inline-block">
                  <!-- <a v-on:click="deleteRole(role.id)" href="javascript:void(0)">刪除</a> -->
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: ["pageData"],
  components: {
    AppLayout,
  },
  data() {
    return {};
  },
  created: function () {},
  computed: {
    datas() {
      return this.pageData.data.map((b) => {
        b.created_at = dayjs(new Date(b.created_at)).format("YYYY-MM-DD "); //HH:mm:ss
        b.updated_at = dayjs(new Date(b.updated_at)).format("YYYY-MM-DD "); //HH:mm:ss
        return b;
      });
    },
  },
  watch: {},
  methods: {},
};
</script>

<style scoped>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,
th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
