<template>
      <ul class="pagination">
    <li class="page-item" v-if="results.current_page > 1" @click.prevent="$emit('get-page',results.current_page-1)">
    <a class="page-link" href="#" aria-label="Previous" >
       <i class="fas fa-chevron-left"></i>
      </a>
       </li>
       <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous" @click.prevent="$emit('get-page',results.current_page+1)">
       <i class="fas fa-chevron-right"></i>
      </a>
       </li>
   
   <!-- <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>-->
  </ul>
</template>
<script lang="ts">

export default Vue.extend({

  mounted(){
    console.log(this.results)

  },

  props:['results']
    
})
</script>
<style scoped>

</style>>