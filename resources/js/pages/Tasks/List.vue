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
                                <a 
                                    v-if="props.user.data.can.edit_tasks" 
                                    href="#" 
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Edit
                                </a>
                                <a 
                                    v-if="props.user.data.can.answer_tasks" 
                                    :href="route('tasks.show', {task: task.id})" 
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Answer
                                </a>
                                <button 
                                    v-if="props.user.data.can.delete_tasks" 
                                    type="button"
                                    :href="route('tasks.show', {task: task.id})" 
                                    @click="deleteTask(task.id)"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="props.score && !userClosedModal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-800 bg-opacity-80">
                <div class="relative p-4 w-full max-w-md max-h-full m-auto">
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <div class="p-4 md:p-5 text-center">
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Your score is</h3>
                            <h1 class="mb-5 text-4xl" v-text="props.score"></h1>
                            <button @click="closeModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ok, thanks
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
const props = defineProps(['user','score']);
const userClosedModal = ref(false);

const closeModal = () => {
    userClosedModal.value = true;
};

const deleteTask = (task_id) => {
    router.delete(route('tasks.destroy', {task: task_id}));
}
</script>