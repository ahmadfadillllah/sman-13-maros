@include('dashboard.layout.head')
@include('dashboard.layout.chatbox')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="chat">
                    <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                        <div class="card-header chat-list-header text-center">
                            <div>
                                <h6 class="mb-1">Chats</h6>
                            </div>
                        </div>
                        <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                            <div id="message">

                            </div>
                        </div>
                        <div class="card-footer type_msg">
                            <div class="input-group">
                                <form id="isian">
                                    <div class="input-group mb-3 input-primary">
                                        <input type="text" class="form-control" name="text" placeholder="Recipient's username">
                                        <button type="submit" class="input-group-text border-0">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Load pusher library --}}
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Get chat from API
    const getChat = async () => {
        const response = await fetch('/chat/get/{{ $room->id }}')
        const data = await response.json()

        // Print chat
        let chatsHTML = ''

        data.map(r => {
            chatsHTML += `
                <div class="d-flex align-items-center
                    ${r.user_id == "{{ Auth::user()->id }}" ? 'text-right justify-content-end' : ''}">
                    <div class="header-media">
                        <img src="{{ asset('yash/yashadmin.dexignzone.com/xhtml/profile') }}/${r.avatar}" style="width:30px;border-radius:30px">
                    </div>
                    <div class="pr-2 ${r.user_id == "{{ Auth::user()->id }}" ? '' : 'pl-1'}">
                        <span class="name" style="color:blue">${r.user_name}</span>
                        <p class="msg">${r.message}</p>
                        <p class="msg" style="font-size:7px">${r.created_at}</p>
                    </div>
                </div>`
        })

        document.getElementById('message').innerHTML = chatsHTML
    }

    window.addEventListener('load', async (ev) => {
        await getChat()

        // Connect to pusher
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        })

        // Connect to chat channel
        const channel = pusher.subscribe('chat-channel')

        // Listen for chat-send event
        channel.bind('chat-send', async (data) => {
            await getChat()
        })

        // Send message
        document.getElementById('isian').addEventListener('submit', async (ev) => {
            ev.preventDefault()

            const message = document.querySelector('input[name="text"]')
            const response = await fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    message: message.value,
                    room: '{{ $room->id }}'
                })
            })


            const data = await response.json()

            if(data) {
                // Get chat
                await getChat()

                message.value = ''
            }
        })
    })
</script>

@include('dashboard.layout.footer')
