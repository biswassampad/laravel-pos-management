<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="form-control" placeholder="What are you looking For???" v-model="search" @keyup="searchProduct()">
                    </div>
                    <div class="card-body love-dov">
                        <ul class="list-group" v-if="results.length>0">
                       <li class="list-group-item" v-for="item in results" :key="item.id">
                            <div class="row">
                                <div class="col-sm-3">{{item.name}}
                                     <img v-if="item.category==1" :src="'/image/veg.png'" class="vnv">
                                    <img v-if="item.category==3" :src="'/image/nonveg.png'" class="vnv">
                                </div>
                                <div class="col-sm-3">
                                <input type="text" class="lekhahue" v-model="amount" placeholder="0"  @keyup="calculatePrice(item.id)">
                                </div>
                                <div class="col-sm-2" >Rs{{item.price}}</div>
                                <div class="col-sm-2">Rs{{value}} </div>
                                 <div class="col-sm-2"><button @click="addorder(item.id)">Save</button></div>
                            </div>
                        </li>
                    </ul>

                    <ul class="list-group" v-if="results.length==0">
                       <li class="list-group-item" v-for="item in items.data" :key="item.id">
                            <div class="row">
                                <div class="col-sm-3">{{item.name}}
                                        <img v-if="item.category==1" :src="'/image/veg.png'" class="vnv">
                                        <img v-if="item.category==3" :src="'/image/nonveg.png'" class="vnv">
                                        
                                </div>
                                <div class="col-sm-3">
                                <input type="text" class="lekhahue" v-model="amount" placeholder="0" @keyup="calculatePrice(item.id)">
                                </div>
                                <div class="col-sm-2">Rs {{item.price}} </div>
                                <div class="col-sm-2">Rs {{value}}</div>
                                <div class="col-sm-2"><button @click="addorder(item.id)">Save</button></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
       export default {
        mounted() {
            console.log('Component mounted.')
              axios.get('/api/getitems')
                .then(response => (this.items = response))
    },
    watch:{
        keywords(after,before){
            this.fetch();
        }
    },
    data() {
        return {
            amount:'',
            items:[],
            search:'',
            key:'',
            showsearch:false,
            results:[],
            qnty:'',
            price:'',
            value:'',
            orderId:'',
            returnData:'',
            name:'',
            };
         },
  
        methods: {  
                searchProduct(){
                    this.results=[];
                    console.log('System is looking for ..');
                    axios.post('/api/searchitem',{
                        query : this.search,
                    }).then((response)=>{
                        // console.log(response);
                        this.results = response.data;
                    }).catch((error)=>{
                        console.log(error);
                    });
                },               
                addorder(id){
                      var currentUrl = window.location.pathname;
                        var orderno = currentUrl.split("/")[2];
                    //     console.log(orderno);
                    //     console.log(this.value);
                    //     console.log(id);
                    //    console.log(this.name);
                         
                        axios.post('/api/additemtoorder/'+orderno,{
                            name:this.name,
                            orderno:orderno,
                            amount:this.amount,
                            value:this.value,
                            id:id,
                        }).then((response)=>{
                            // console.log(response.data);
                        }).catch((error)=>{ 
                            console.log(error);
                        });
                },
                calculatePrice(id){
                  axios.get('/api/getpirce/'+id,{
                  }).then((response)=>{
                      this.price=response.data;
                      this.value=this.amount*this.price[0].price;
                      this.name=this.price[0].name;
                  }).catch((error)=>{
                      console.log(error);
                  });
                }
            }

        }

</script>
<style>
.vnv{
    height:20px;
    width:20px;
}
.lekhahue{
    width:50px;
}
.love-dov{
    height:500px;
    overflow: scroll;
    overflow-x:hidden;
}
</style>