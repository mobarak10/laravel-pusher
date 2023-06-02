<!-- resources/views/chat.blade.php -->
<x-app-layout>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body" id="root">
                <chat-messages :messages="messages"></chat-messages>
            </div>
            <div class="card-footer">
                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
            </div>
        </div>
    </div>
</x-app-layout>
