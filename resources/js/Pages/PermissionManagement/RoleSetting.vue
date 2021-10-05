<template>
  <AppLayout title="Role">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Role</h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="container mb-6 pt-5 px-4 mx-auto">
        <RoleModal @refresh="refresh()" />
      </div>

      <div class="container mb-6 px-4 mx-auto">
        <table>
          <tr>
            <th>名稱</th>
            <th>是否為預設</th>
            <th>建立時間</th>
            <th>修改時間</th>
            <th></th>
          </tr>
          <tr v-for="role in roles">
            <td>{{ role.name }}</td>
            <td>{{ role.is_default }}</td>
            <td>{{ role.created_at }}</td>
            <td>{{ role.updated_at }}</td>
            <td>
              <div class="space-x-4">
                <div class="inline-block">
                  <RoleModal :id="role.id" @refresh="refresh()" />
                </div>

                <div class="inline-block">
                  <a v-on:click="deleteRole(role.id)" href="javascript:void(0)">刪除</a>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>

       <div class="text-center">
        <CommonPagination
          :pageCount="pageData.last_page"
          :currentPath="pageData.current_page"
          urlPath="/admin/permission-management/role-setting"
        />
      </div>
    </div>
  </AppLayout>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout";
import RoleModal from "@/Components/Modals/RoleModal";
import CommonPagination from "@/Components/Pagination/CommonPagination";

export default {
  props: ["pageData"],
  components: {
    AppLayout,
    RoleModal,
    CommonPagination
  },
  data() {
    return {};
  },
  created: function () {},
  computed: {
    roles() {
      return this.pageData.data.map((b) => {
        b.created_at = dayjs(new Date(b.created_at)).format("YYYY-MM-DD "); //HH:mm:ss
        b.updated_at = dayjs(new Date(b.updated_at)).format("YYYY-MM-DD "); //HH:mm:ss
        return b;
      });
    },
  },
  watch: {},
  methods: {
    refresh() {
      Inertia.visit("/admin/permission-management/role-setting?page=" + 1, {
        method: "get",
      });
    },
    deleteRole(id) {
      common.confirmAlert("你確定要刪除嗎？").then((result) => {
        if (result.isConfirmed) {
          axios.delete("/api/role/" + id).then((x) => {
            this.$swal.fire("系統訊息", "刪除成功!", "success");
            this.refresh();
          });
        }
      });
    },
  },
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
