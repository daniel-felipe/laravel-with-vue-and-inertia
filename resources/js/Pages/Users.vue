<template>
    <Head>
        <title>My App - Users</title>
    </Head>

    <h2 class="text-4xl font-bold">Users</h2>

    <Nav />

    <div style="margin-top: 400px">
        <p>The current time is: {{ time }}.</p>

        <Link 
            href="/users" 
            class="text-blue-500" 
            preserve-scroll
        >
            Refresh
        </Link>
    </div>
</template>

<script setup>
defineProps({
    time: String,
});
</script>
