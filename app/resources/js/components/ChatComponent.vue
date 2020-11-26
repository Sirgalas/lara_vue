<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea rows="6" readonly="" class="form-control">{{dataMessage.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter message" v-model="message">
                </div>
                <div class="input-group ">
                    <button @click="sendMessage" class="btn btn-default" type="button">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
       data:function(){
           return {
               dataMessage:[],
               message:"",
           }
       },
        sockets: {
            connect() {
                this.isConnected = true;
            },

            disconnect() {
                this.isConnected = false;
            },
            'chat-message'(data){
                console.log(data)
                this.dataMessage.push(data.message)
            },
            messageChannel(data) {
                this.data=data;
            }
        },
        mounted() {
            this.$socket.on('chat-message',(data)=>{
                console.log(data)
                this.dataMessage.push(data);
            });
        },
        methods:{
            sendMessage:function () {
                axios({
                    method:"get",
                    url:'start/chat',
                    params:{
                        message:this.message
                    }
                }).then((response)=>{
                    console.log(response.data);
                    /*this.dataMessage.push(response.data);*/
                    this.$socket.emit('chat-message',response.data);
                    /*this.$socket.emit('chat-message',(data)=>{
                        console.log(data)
                        this.dataMessage=data.result;
                    });*/
                    this.message="";
                });
            }
        }
    }
</script>
