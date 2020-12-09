<template>
   <div class="col-md-8" >
            <div class="card" v-if="active.dashboard">
                <div class="card-header">Manage Users<button class="btn btn-warning float-right" @click="setActive('createuser')"><i class="fas fa-plus"></i></button></div>
                <paginator v-if="results !== null" v-bind:results="results" v-on:get-page="getPage"></paginator>

                <div class="card-body">
                <div class="alert alert-success" v-if="succuss_message !== null">
               {{success_message}}
                </div>
                <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for='user in results.data'>
      <th scope="row">{{user.id}}</th>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
      <td><a class="btn btn-warning"><i class="fas fa-fa-edit"></i></a></td>
    </tr>
   
  </tbody>
</table>

              
                </div>
            </div>
            <createuser v-if="active.createuser" v-on:view-dashboard="setActive('dashboard')" v-on:user-created="flashSuccess()"></createuser>
        </div>
</template>
<script lang="ts">

import paginator from './Paginator.vue';
import createuser from './CreateUser.vue';


export default Vue.extend({

    data(){
        return{
            results:null,
            active:{
                 dashboard:true,
                createuser:false
               

            },
            params:{
                page:1
            },
            successful_message:null,

        }
    },
    components:{
        paginator:paginator,
        createuser:createuser
        

    },
    mounted(){

        this.getUser()

    },
    methods:{
        getUser:function(){
            axios.get('/data/users',{params : this.params}).then(response=>{
                this.results = response.data.results

            })


        },

        getPage:function(event){
            this.params.page = event
            this.getUser()

        },
        setActive:function(component){
            Object.keys(this.active).forEach(key=>this.active[key] = false)
            this.active[component] = true
        },
        flashSuccess:function(event){
            
           this.success_message = event
           this.getUser()

        }

    }
    
})
</script>
<style scoped>

</style>