<template>
    <div>
        <h2>Hello, {{ name }}!</h2>

        <p>In this repo, we will use the following frameworks:</p>
        <ul>
            <li v-for="framework of frameworks" v-text="framework"></li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        frameworks: Array,
    }
};
</script>