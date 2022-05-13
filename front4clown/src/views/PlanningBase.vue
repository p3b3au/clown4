<template>
    <table class="styled-table">
        <ModalView v-if="showModal" @close="showModal = false" :clownId='clown_id' :clownPseudo='clown_pseudo'/>

        <h3 slot="header">custom header</h3>


        <thead>
            <!--<tr>
                <th>pseudo</th>
                <th>sexeHomme</th>
                <th>musicien</th>
                
                <th>img</th>
             <th colspan="2" style="cursor :pointer">
                    <router-link :to="'AdminNew'">New</router-link></th> 
            </tr> -->
        </thead>
        <tbody>
            <th class="course" v-for="interv in intervs" :Key="interv.id">
              
                <td class="course-info">
                    <h3>{{ interv.lieu_id[1] }}</h3><br>
                    <h3>{{ interv.id }}</h3><br>
                    <h3>{{ interv.dateheure }}</h3>
                </td>
              <tr class="cartouche" :style="{ backgroundColor: interv.clownA[5] }">
                <td><img class="img" :src="require(`@/assets/static/img/${interv.clownA[1]}.jpg`)" /></td>
                <td class="cartouche-info">
                    <h3>{{interv.clownA[1]}}</h3>
                </td>
                <td class="cartouche-info">{{ isMan(interv.clownA[3]) }}</td>
                <td class="cartouche-info">{{ isMusician(interv.clownA[4]) }}</td>
                </tr>
                <tr class="cartouche" :style="{ backgroundColor: interv.clownB[5] }">
                <td><img class="img" :src="require(`@/assets/static/img/${interv.clownB[1]}.jpg`)" /></td>
                <td class="cartouche-info">
                    <h3>{{interv.clownB[1]}}</h3>
                </td>
                <td class="cartouche-info">{{ isMan(interv.clownB[3]) }}</td>
                <td class="cartouche-info">{{ isMusician(interv.clownB[4]) }}</td>
                </tr>-->
                
                <td id="show-modal" style="cursor :pointer" @click="showModal = true ; giveId(interv.id); giveLieu(interv.id_lieu)">💬</td>
                <!-- <td style="cursor :pointer" @click="goToFilmDelete(movie.id)">🗑</td>-->
            </th>
        </tbody>
    </table>

</template>

<script>

import ModalView from '@/components/ModalView.vue'
import axios from 'axios'
const ALL_INTERVS_READ_API_URL = "http://localhost:8787/api/allInterv"


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
        
    }),

    methods: {
      /*  displayPic(clo){
           return this.interv.clownA[3]
        },*/

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
        }

    },
  

 
    async created() {

        const intervdb = await axios.get(ALL_INTERVS_READ_API_URL)
        this.intervs = intervdb.data
        console.log(this.intervs)
 

       /* const clownsdb = await axios.get(ALL_CLOWNS_READ_API_URL)
        this.clowns = clownsdb.data
        console.log(this.clowns)*/

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
    color: #ffffff;
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

.course-preview {
    color: #fff;
    display: inline-block;
    font-size: 12px;
    opacity: 0.6;
    margin-top: 30px;
    text-decoration: none;
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