
<template>
   <div class="container">
       {{items}}
   </div>
</template>

<script>
export default {
    data(){
         return {
        items:[],
         }
    },
mounted() {
        var currentUrl = window.location.pathname;
        var orderno = currentUrl.split("/")[2];
            console.log('Component mounted.')
              axios.get('/api/getorderdetails'+orderno)
                .then(response => (this.items = response))
    },
}
</script>

<style>

</style>
