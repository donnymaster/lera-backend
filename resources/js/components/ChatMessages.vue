<template>
    <ul class="chat" ref="messageDisplay">
        <li
            class="left clearfix"
            :class="{'border-b' : user.id == message.user.id}"
            v-for="message in messages"
        >
        <span class="chat-img pull-left">
             <img v-bind:src="getLocation(message.user.avatar)" alt="User Avatar" class="img-circle">
        </span>
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.nick }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages', 'user'],

    methods: {
        getLocation(link){
            return '../' + link;
        }
    },
    computed: {
        'dynamic_image': function(link){
            return window.location.host + '/' + link;
        }
    }
  };
</script>
