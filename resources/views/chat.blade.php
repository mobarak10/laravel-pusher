<!-- resources/views/chat.blade.php -->
<x-app-layout>
    <div class="container mt-3" id="root">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body">
                <chat-messages></chat-messages>
            </div>
            <div class="card-footer">
                <chat-form :user="{{ Auth::user() }}"></chat-form>
            </div>
        </div>
    </div>
</x-app-layout>
