<template>
    <Head>
        <title>My App - Users</title>
    </Head>

    <h2 class="text-4xl font-bold mb-6">Users</h2>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td class="pl-6">{{ user.name }}</td>
                    <td class="py-4 px-6 text-end">
                        <Link
                            :href="`/users/${user.id}/edit`"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        >
                            Edit
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- paginator -->
    <Pagination :links="users.links" />
</template>

<script setup>
import Pagination from '../Shared/Pagination.vue'

defineProps({
    users: Object,
});
</script>
