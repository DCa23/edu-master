<template>
    <AppLayout>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <a 
                    v-if="props.user.data.can.add_tasks"
                    :href="route('tasks.create')"
                    type="button" 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        + Create Task
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">
                                Title
                            </th>
                            <th class="px-6 py-3">
                                Teacher
                            </th>
                            <th class="px-6 py-3 text-center">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in props.user.data.tasks" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{task.title}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{task.teachers[0]?.name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a v-if="props.user.data.can.edit_tasks" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a v-if="props.user.data.can.answer_tasks" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Answer</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps(['user']);
console.log(props);
</script>