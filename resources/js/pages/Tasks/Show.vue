<template>
    <AppLayout>
        <form @submit.prevent="submitTask" class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="text-center">{{ props.task.title }}</div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="text-center">
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Questions</span>
                </div>
                <div class="text-center">
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answers</span>
                </div>
            </div>
            <div v-for="question,index in props.task.task_questions" class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <input :value="question.question" type="text" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
                <div>
                    <select v-model="form.answers[index]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option v-for="answer in answers" :value="answer">{{ answer}}</option>
                    </select>
                </div>
            </div>
            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Submit answers
            </button>


            
        </form>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['task']);

const form = useForm({
    task_id: props.task.id,
    answers: [],
});

const submitTask = () => form.post(route('submission.store'))
const answers = props.task.task_questions.map(item => item.answer);

</script>