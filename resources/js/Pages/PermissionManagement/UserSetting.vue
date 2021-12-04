<template>
  <AppLayout title="使用者管理">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">使用者管理</h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="container mb-6 pt-5 px-4 mx-auto">
        <UserModal @refresh="refresh()" />
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
                      class="px-6 py-3 text-left font-medium text-gray-500 tracking-wider"
                    >
                      名稱
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left font-medium text-gray-500 tracking-wider"
                    >
                      email
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left font-medium text-gray-500 tracking-wider"
                    >
                      建立時間
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left font-medium text-gray-500 tracking-wider"
                    >
                      修改時間
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left font-medium text-gray-500 tracking-wider"
                    ></th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="user in users" v-bind:key="user.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ user.name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ user.email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ user.created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ user.updated_at }}</td>
                    <td class="px-6 py-4 ">
                      <div>
                        <div class="inline-block mr-3">
                          <UserModal :id="user.id" @refresh="refresh()" />
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
          urlPath="/admin/permission-management/user-setting"
        />
      </div>
    </div>
  </AppLayout>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout";
import UserModal from "@/Components/Modals/UserModal";
import CommonPagination from "@/Components/Pagination/CommonPagination";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["pageData"],
  components: {
    AppLayout,
    UserModal,
    CommonPagination,
    Link,
  },
  data() {
    return {};
  },
  created: function () {},
  computed: {
    users() {
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
      Inertia.visit("/admin/permission-management/user-setting?page=" + 1, {
        method: "get",
      });
    },
  },
};
</script>
