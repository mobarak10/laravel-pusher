<template>
<!--    Display an input field and a send button.-->
    <div class="input-group">
<!--        Input field.-->
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
        />
<!--        Button-->
        <span class="input-group-btn">
<!--      Call sendMessage() this button is clicked.-->
      <button class="btn btn-primary" id="btn-chat" @click="sendMessage">
        Send
      </button>
    </span>
    </div>
</template>
<script setup>
import { storeToRefs } from 'pinia';
import {onMounted, ref, watch } from "vue";
import {usePiniaStore} from "../store";

const store = usePiniaStore()

const { messages: _messages } = storeToRefs(store)

watch(_messages, (messages) => {
    if (messages) {
        store.fetchMessages()
        window.Echo.private('chat')
            .listen('MessageSent', (e) => {
                store.$patch(state => {
                    state.messages.push({
                        message: e.message.message,
                        user: e.user
                    })
                })
            });
    }
},{ deep: true })

const props = defineProps({
    user: Object,
})
let newMessage = ref()

const sendMessage = () => {
    store.addMessage({user: props.user, message: newMessage.value})
    newMessage.value = "";
}

onMounted(() => {
    store.fetchMessages()
    window.Echo.private('chat')
        .listen('MessageSent', (e) => {
            const store = this.store()
            store.$patch(state => {
                state.messages.push({
                    message: e.message.message,
                    user: e.user
                })
            })
        });
})
</script>
