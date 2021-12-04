<template>
  <AppLayout title="角色管理">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">角色管理</h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="container mb-6 pt-5 px-4 mx-auto">
        <RoleModal @refresh="refresh()" />
      </div>

      <div class="container mb-6 px-4 mx-auto">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr class="text-base">
                    <th
                      scope="col"
                      class="px-6 py-3 text-left  font-medium text-gray-500 tracking-wider"
                    >
                      角色名稱
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left  font-medium text-gray-500 tracking-wider"
                    >
                      是否為預設
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left  font-medium text-gray-500 tracking-wider"
                    >
                      建立時間
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left  font-medium text-gray-500 tracking-wider"
                    >
                      修改時間
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left  font-medium text-gray-500 tracking-wider"
                    ></th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="role in roles" v-bind:key="role.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ role.name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        v-if="role.is_default"
                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-green-600 rounded-full"
                        >是</span
                      >
                      <span
                        v-if="!role.is_default"
                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full"
                        >否</span
                      >
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ role.created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ role.updated_at }}</td>
                    <td class="px-6 py-4">
                      <div >
                        <div class="inline-block mr-3">
                          <RoleModal :id="role.id" @refresh="refresh()" />
                        </div>
                        
                        <div class="inline-block whitespace-nowrap">
                          <a class="text-sm" v-on:click="deleteRole(role.id)" href="javascript:void(0)"
                            >刪除</a
                          >
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
    CommonPagination,
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
