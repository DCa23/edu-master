<template>
    <AppLayout>
        <form @submit.prevent="createTask" class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <div class="mb-6">
                    <label for="large-input" class="text-center block mb-2 text-4xl text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                    <input v-model="form.title" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <InputError :message="form.errors.title" class="mt-1"></InputError>
                </div>
            </div>

            <div v-for="question in form.questions" class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                    <input v-model="question.question" type="text" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</label>
                    <input v-model="question.answer" type="text" id="answer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Save Task
                </button>
                <button
                    type="button"
                    @click="addQuestion"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Add Question Task
                </button>
            </div>
        </form>
    </AppLayout>
</template>

<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    questions: [
        {question : "",answer:""},
    ],
});

const createTask = () => form.post(route('tasks.store'));

const addQuestion = () => {
    form.questions.push(
        {question : "",answer:""},
    )
}
const props = defineProps(['user']);
</script>