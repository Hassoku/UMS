<template>
<div class="card">
  <div class="card-header">
    <button class="btn btn-primary" @click="$emit('view-dashboard')">Back</button>Add User
  </div>
  <div class="card-body">
  <div class="alert alert-danger" v-if="this.errors.length > 0">
  <ul >
  <li v-for="error in errors">{{error}}</li>
  </ul>
  </div>
   <form>
  <div class="form-group">
    <label>Name</label>
    <input type="text" v-model="data.name" name="name" class="form-control"  placeholder="Enter Name">
   
  </div>
    <div class="form-group">
    <label>Email</label>
    <input type="text" v-model="data.email" name="email" class="form-control"  placeholder="Enter Email">
   
  </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select name="role"  v-model="data.role"  class="form-control" id="exampleFormControlSelect1">
      <option v-model="data.role">Admin</option>
      <option v-model="data.role">User</option>
    
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" v-model="data.password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" v-model="data.confirm_password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="button" @click="addUser" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</template>
<script lang="ts">

export default {
  data(){
    return{
      data: {
         name:'',
         email:'',
         role:'User',
         password:'',
         confirm_password:''
      

      },
      errors:[]

    }
  },
  methods:{
    addUser:function(){
    this.errors = []
      axios.post('/data/users',{
        name: this.data.name,
        email: this.data.email,
        role: this.data.role,
        password: this.data.password,
        confirm_password:this.data.confirm_password

      }).then(response=>{
        this.$emit('created-user','User'+response.data.user.name+' Created Successfuly')
        }).catch(errors=>{
          if(errors.response.status === 422){
            this.flashMessage(errors.response.data.errors)
          }
          if(errors.response.status === 403){
            this.flashMessage(errors.response.data.errors)
          }
        })
    },
    flashMessage:function(errors){
      for(const [key, value] of Object.entries(errors)){
        for(let item in value){
          this.errors.push(value[item])
        }
      }

    }
  }
}
 
</script>
<style scoped>

</style>>