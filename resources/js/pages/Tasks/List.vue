<template>
    <AppLayout>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h1>test</h1>
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
                                <a v-if="props.user?.data.role == 'teacher'" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a v-else href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Answer</a>
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