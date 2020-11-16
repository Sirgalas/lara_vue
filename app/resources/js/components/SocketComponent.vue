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
               data:[],
               realtime:false,
               label:'',
               sale:500
           }
       },
        mounted() {
            let socket=io('http://localhost:8205');
            socket.on('chart-channel:\\App\\Events\\ChartEvent',function (data) {

                this.data=data.result;
            }.bind(this));
            this.update()
        },
        methods:{
            update:function () {
               //this.is_refresh=true
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
