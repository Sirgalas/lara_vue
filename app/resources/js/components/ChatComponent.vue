<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea rows="6" readonly="" class="form-control">{{dataMessage.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter placeholder" v-model="message">
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
        mounted() {
            let socket=io('http://localhost:8205');
            socket.on('chat-message:\\App\\Events\\NewMessage',function (data) {
                console.log(data);
                this.dataMessage.push(data.message);
            }.bind(this));
        },
        methods:{
            sendMessage:function () {
                console.log(this.message);
                axios({
                    method:"get",
                    url:'start/chat',
                    params:{
                        message:this.message
                    }
                }).then((response)=>{
                    console.log(response)
                    this.message="";
                });
            }
        }
    }
</script>
