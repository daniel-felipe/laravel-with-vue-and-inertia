<template>
    <Head>
        <title>My App</title>
        <meta name="description" content="Information about my app" head-key="description" />
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">
                    My App
                </h1>
    
                <p class="text-sm ml-4">
                    Welcome Back, {{ username }}!
                </p>
            </div>

            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <iframe
                class="mb-6"
                width="100%"
                frameborder="no"
                scrolling="no"
                seamless
                src="https://player.simplecast.com/08381222-a27d-497b-813a-e66c04b6f50f?dark=false"
            ></iframe>
            <slot />
        </div>
    </section>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import Nav from './Nav';

export default {
    components: { 
        Nav,
        Head
    },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>Nav