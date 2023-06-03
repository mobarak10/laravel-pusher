<template>
    <ul class="chat">
        <li class="clearfix" v-for="message in store.messages" :key="message.id">
            <div class="clearfix" :class="store.loginUser.id == message.user_id ? 'text-end' : ''">
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
import {usePiniaStore} from "../store";

const store = usePiniaStore()

</script>
