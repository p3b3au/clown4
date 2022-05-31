<template>
    <table class="styled-table">
        <ModalViewA v-if="showModalA" @close="showModalA = false" 
        :intervId = 'interv_id'
        :clownId= 'clown_id' 
        :clownPseudo='clown_pseudo'
        @showSelectedClownA="handleClownSelectedA"
        />
        
        <ModalViewB v-if="showModalB" @close="showModalB = false" 
        :intervId = 'interv_id'
        :clownId= 'clown_id' 
        :clownPseudo='clown_pseudo'
        @showSelectedClownB="handleClownSelectedB"
        />
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
            <th class="course" v-for="interv in intervs" :Key="interv.id" :value="interv.id">
              
                <td class="course-info">
                    <h3>le {{ left(interv.dateheure) }}</h3>
                    <h3>à {{ interv.lieu_id[1] }}</h3><br>
                    <br>
                </td>

<div style="color:black">Selected: {{ clownA_Post[interv.id] }}</div>
<div id="show-modal" style="cursor :pointer" @click="showModalA = true ; giveIntervId(interv.id);">💬</div>
  
  
               
              
            <div style="color:black">Selected: {{ clownB_Post[interv.id] }}</div>
<div id="show-modal" style="cursor :pointer" @click="showModalB = true ; giveIntervId(interv.id);">💬</div>
  
                
            </th>
        </tbody>
    </table>

</template>

<script>
// import ClownCard from '@/components/ClownCard.vue';
import ModalViewA from "@/components/ModalViewA.vue";
import ModalViewB from "@/components/ModalViewB.vue";
import axios from "axios";
const ALL_INTERVS_READ_API_URL = "http://localhost:8787/api/allInterv";
const ALL_CLOWNS_READ_API_URL = "http://localhost:8787/api/allClown";

export default {
  name: "PlanningBase",
  components: {
    ModalViewA,
    ModalViewB,

    // ClownCard,
  },
  data: () => ({
    showModalA: false,
    showModalB: false,

    clowns: [],
    clown_id: "",
    interv_id: "",
    clown_pseudo: "",
    intervs: [],
    clownA_Post: {},
    clownB_Post: {},
    selectedClown: "",
    intervIdRetour: "",
  }),

  methods: {
    displayPic(clo) {
      return require(`@/assets/static/img/${clo}.jpg`);
    },

    isMan(clown) {
      let sex = "";
      if (clown == 1) {
        sex = "🧔";
      } else {
        sex = "👩‍🦰";
      }
      return sex;
    },

    isMusician(clown) {
      let music = "";
      if (clown == 1) {
        music = "🎵";
      } else {
        music = "";
      }
      return music;
    },

    giveIntervId(id) {
      this.interv_id = id;
      console.log(id);
    },

    left(date) {
      return date.substring(0, 10);
    },

    handleClownSelectedA(payload2, intervIdRetour) {
      console.log(payload2, intervIdRetour);
      // object destructuring car pourquoi pas?
      // je met à jour la data locale "selectedCourse"
      this.clownA_Post[intervIdRetour] = this.clowns[payload2 - 1].pseudo;
      
    },

    handleClownSelectedB(payload2, intervIdRetour) {
      console.log(payload2, intervIdRetour);
      // object destructuring car pourquoi pas?

      // je met à jour la data locale "selectedCourse"
      this.clownB_Post[intervIdRetour] = this.clowns[payload2 - 1].pseudo;
    },
  },

  async created() {
    const intervdb = await axios.get(ALL_INTERVS_READ_API_URL);
    this.intervs = intervdb.data;
    console.log(this.intervs);

    const clownsdb = await axios.get(ALL_CLOWNS_READ_API_URL);
    this.clowns = clownsdb.data;
    console.log(this.clowns);
  },
};
</script>






<style scoped>
.img {
  height: 30px;
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

.styled-table thead {
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

.cartouche-info {
  align-self: center;
}
</style>