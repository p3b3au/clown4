<template>
    <table class="styled-table">
        <ModalView v-if="showModal" @close="showModal = false" :clownId='clown_id' :clownPseudo='clown_pseudo'/>

        <h3 slot="header">custom header</h3>


<div class="container" style="color:black">
	<div class="header">
        <h2>editer les interv</h2>
        {{clownA_Post}}
        {{clownB_Post[1]}}
	</div>
	<form id="form" class="form" v-for="interv in intervs" :Key="interv.id">
		<div class="form-control">
			{{interv.dateheure}}
		</div>
		<div style="color:black">Selected: {{ clownA_Post[interv.id]}}</div>
                <select class="custom-select" v-model="clownA_Post[interv.id]" :id="interv.clownA">
                <option class="cartouche" v-for="clown in clowns" :key="clown.id" :style="{ backgroundColor: clown.couleur }">
                   <span :style="{ backgroundColor: clown.couleur}">  <img :src="displayPic(clown.pseudo)"/>
                    {{ clown.pseudo }}
                    {{ isMan(clown.homme) }}
                    {{ isMusician(clown.musicien) }}</span>
                  
                  
                </option>
                </select>
		<div style="color:black">Selected: {{ clownB_Post[interv.id] }}</div>
                <select class="custom-select" v-model="clownB_Post[interv.id]" :id="interv.clownB">
                <option class="cartouche" v-for="clown in clowns" :key="clown.id" :style="{ backgroundColor: clown.couleur }">
                   <span :style="{ backgroundColor: clown.couleur}">  <img :src="displayPic(clown.pseudo)"/>
                    {{ clown.pseudo }}
                    {{ isMan(clown.homme) }}
                    {{ isMusician(clown.musicien) }}</span>
                  
                </option>
                </select>
                <br>
				<input type="submit" value="submit" :name="interv.id.AB">
               <span> {{interv.id}}</span>
               
               <br><br>
	</form>
    <br>
  
 <br><br>
</div>




       </table>

    

           
</template>

<script>

import ModalView from '@/components/ModalView.vue'
import axios from 'axios'
const ALL_INTERVS_READ_API_URL = "http://localhost:8787/api/allInterv"
const ALL_CLOWNS_READ_API_URL = "http://localhost:8787/api/allClown"

export default {
    name: 'PlanningBase',
    components: {
        ModalView
    },
    data: () => ({
        showModal: false,
        clowns: [],
        clown_id: '',
        clown_pseudo:'',
        intervs:[],
        clownA_Post: {},
        clownB_Post: {},

    

    }),
    methods: {


       displayPic(clo) {
      return require(`@/assets/static/img/${clo}.jpg`);
    },
        isMan(clown) {
            let sex = ''
            if (clown == 1) {
                sex = "🧔"
            } else {
                sex = "👩‍🦰"
            }
            return sex
        },


        isMusician(clown) {
            let music = ''
            if (clown == 1) {
                music = "🎵"
            } else {
                music = ""
            }
            return music
        },

        giveId(id) {
            this.interv_id = id
        },
        giveLieu(lieu){
            this.interv.id_lieu = lieu
        },
        left(date){
            return date.substring(0,10)
        }


    },
        

    
  

 
    async created() {

        const intervdb = await axios.get(ALL_INTERVS_READ_API_URL)
        this.intervs = intervdb.data
        console.log(this.intervs)
 
        
       const clownsdb = await axios.get(ALL_CLOWNS_READ_API_URL)
        this.clowns = clownsdb.data
        console.log(this.clowns)
        
    },

}


</script>






<style scoped>
.img{
height:30px;
border-radius: 50px;

}

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 1200px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead  {
    background-color: #009879;
   
}


.styled-table td {
    padding: 10px 2px;
    color: black;
}

.styled-table tbody {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}


.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.course {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    align-content: center;
    justify-content: center;
    max-width: 100%;
    margin: 2px;
    overflow: hidden;
    width: 1300px;
    height: 150px;
}


.course-info {
    
    padding: 10px;
    position: relative;
    width: 100%;
}

.cartouche {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    align-content: center;
    justify-content: space-around;
    max-width: 100%;
    margin: 10px;
    overflow: hidden;
    width: 300px;
    height: 50px;
}

.cartouche-info{
    align-self: center;

}




</style>