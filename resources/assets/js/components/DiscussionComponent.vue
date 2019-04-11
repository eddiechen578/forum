<template>
    <div class="card">
        <div class="card-header">Add Discussion </div>
        <div class="card-body">
            <form @submit.prevent="postDis">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control"
                           v-model="title"
                    >
                </div>
                <div class="form-group">
                    <label >Content</label>
                    <VueTrix class="editor1" inputId="editor1" v-model="content"/>
                </div>
                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select name="channel" id="channel" class="form-control"
                        v-model="channel_id"
                    >
                        <option :value="channel.id" v-for="channel in channels">
                            {{channel.name}}
                        </option>
                    </select>
                </div>
                <button class="btn btn-success">Create Discussion</button>
            </form>
        </div>
    </div>
</template>

<script>
    import VueTrix from 'vue-trix';
    export default {
        components: {
            VueTrix
        },
        data(){
            return{
                channels:[],
                title:null,
                channel_id:null,
                content:null
            }
        },
        methods:{
            getChannels(){
                axios.post('/getChannels/api').then(res=>{
                    this.channels = res.data;
                });
            },
            postDis(){
                axios.post('/storeDis', {
                    'title' : this.title,
                    'content' : this.content,
                    'channel_id' : this.channel_id
                }).then(res=>{
                    console.log(res)
                });
            }
        },
        created(){
            this.getChannels();
        }
    }
</script>

