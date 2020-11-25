<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <line-chart :chart-data="data" ata="data" :height="100" :options="{responsive:true, maintainAspectRatio:true}"></line-chart>
                <input type="checkbox" v-model="realtime">realtime
                <input type="text" v-model="label">
                <input type="text" v-model="sale">
                <button @click="sendData" class="btn btn-primary btn-xs text mt-1 mh-100">Обновить </button>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from "./LineChart";
    export default {
        components:{
            LineChart
        },
       data:function(){
           return {
               isConnected: false,
               data:[],
               realtime:false,
               label:'',
               sale:500
           }
       },
        sockets: {
            connect() {
                this.isConnected = true;
            },

            disconnect() {
                this.isConnected = false;
            },
            'chart-channel'(data){
                this.data=data.result
            },

            messageChannel(data) {
                this.data=data;
            }
        },
        mounted() {
            this.update()
        },
        methods:{
            update:function () {
               axios.get('start/socket-chart').then((response)=>{
                   this.data=response.data;
               });
            },
            sendData:function () {
                axios({
                    method:"get",
                    url:'start/socket-chart',
                    params:{
                        realtime: this.realtime,
                        label: this.label,
                        sale: this.sale
                    }
                }).then((response)=>{
                    this.data=response.data;
                });
            }
        }
    }
</script>
