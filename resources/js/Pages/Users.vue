<template>
    <Layout>
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
    </Layout>
</template>

<script>
import Layout from '../Shared/Layout.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default { 
    components: { 
        Layout,
        Link,
    },

    props: { 
        time: String 
    }
};
</script>
