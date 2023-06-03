import {usePiniaStore} from "./index";
import state from "./state";

export default {
    async fetchMessages(){
        const url = `${baseURL}/messages`
        const response = await axios.get(url)

        const store = this.store()
        store.$patch(state => {
            state.messages = response.data
        })

    },

    async addMessage(payload) {
        const store = this.store()
        store.$patch(state => {
            state.messages.push(payload)
        })
        //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
        axios.post(baseURL + '/messages', payload).then(response => {
            console.log(response.data);
        });
    },

    store() {
        return usePiniaStore()
    }
}


