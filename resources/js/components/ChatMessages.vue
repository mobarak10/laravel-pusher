<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in props.messages" :key="message.id">
            <div class="clearfix">
                <div class="header">
                    <strong>
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>
<script setup>
import {onMounted} from "vue";

const props = defineProps({
    messages: Object
})

</script>
