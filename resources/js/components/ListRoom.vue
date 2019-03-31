<template>
    
</template>

<script>
export default {
    data(){
        return{
            tableno:'',
        }
    },
     mounted:function(){
         
       
        
        this.method1(); 
  },
   methods:{
       method1(){
            var currentUrl = window.location.pathname;
          var orderno = currentUrl.split("/")[2];
          axios.get('tableno/'+orderno,{})
        .then(response=>{
            console.log(response.data);
            this.tableno=response.data[0].tableno;
            console.log(this.tableno);
            axios.post('inactive/'+orderno,{

            }).then((response)=>{
                console.log(response.data);
            });
            axios.post('vacanttable/'+this.tableno,{

            }).then((response)=>{
                console.log(response.data);
            });
        }).catch((error)=>{
            console.log(error);
        });
       }
   }
}
</script>

<style>

</style>
