<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form @submit="formSubmit">
                <div class="form-group">
                 <label for="customername">Customer Name</label>
                    <input type="text" v-model="name" class="form-control" id="customername" placeholder="John Doe">
                </div>
                
                <div class="form-group">
                 <label for="customername">Customer Mobile</label>
                    <input type="phone" v-model="mobile" class="form-control" id="customername" placeholder="1234567890">
                </div>
                
                <div class="form-group">
                 <label for="members">No of. Members</label>
                    <select v-model="members" id="members" class="form-control">
                        <option>2</option>
                        <option>4</option>
                        <option>6</option>
                        <option>8</option>
                    </select>
                </div>
                
                 <div class="form-group" v-if="this.members==2">
                    <label for="tableno">Tables Available for 2</label>
                        <select class="form-control" id="tableno" v-model="tableno">
                            <option> Select Below </option>
                            <option v-for="table in tables.data" :key="table.id">{{table.tableno}}</option>
                            </select>
                    </div>
                 <div class="form-group" v-if="this.members==4">
                    <label for="tableno">Tables Available for 4</label>
                        <select class="form-control" id="tableno" v-model="tableno">
                            <option> Select Below </option>
                            <option v-for="table in tables.data" :key="table.id">{{table.tableno}}</option>
                            </select>
                        </div>

                        <div class="form-group" v-if="this.members==6">
                    <label for="tableno">Tables Available for 6</label>
                        <select class="form-control" id="tableno" v-model="tableno">
                            <option> Select Below </option>
                            <option v-for="table in bigtables.data" :key="table.id">{{table.tableno}}</option>
                            </select>
                        </div>
                        
                        <div class="form-group" v-if="this.members==8">
                    <label for="tableno">Tables Available for 8</label>
                        <select class="form-control" id="tableno" v-model="tableno">
                            <option> Select Below </option>
                            <option v-for="table in bigtables.data" :key="table.id">{{table.tableno}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit">Add & Proceed</button>
                        </div>
                </form>
                       <div v-if="number">
                           Ready to Accept order for Order No .{{number}} 
                          
                       </div>
                        <a href="#">Click Here</a>
                        </div>
                    </div>
                </div>
</template>

<script>
       export default {
      
    data() {
        return {
            bigtables:[],
            tables:[],
            tableno:'',
            members:'',
            name:'',
            mobile:'',
            number:null,
            path:'/additem2order'
            };
         },
         props:{
         },

        methods: {  
                 formSubmit(e) {
                     e.preventDefault();
                     axios.post('/api/addorderres',{
                         name:this.name,
                         mobile:this.mobile,
                         tableno:this.tableno,
                         members:this.members
                     })
                     .then((response)=>{
                       this.number = response.data
                     }).catch((error)=>{
                         console.log(error);
                     });
                 }
            },
        mounted() {
            console.log('Component mounted.')
              axios.get('/api/gettablesfour')
                .then(response => (this.tables = response))

            axios.get('/api/gettablessix')
            .then(response=>(this.bigtables = response))
    },

        }

</script>
