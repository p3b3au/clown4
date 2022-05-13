<template>
    <table class="styled-table">
        <ModalView v-if="showModal" @close="showModal = false" :clownId='clown_id' :clownPseudo='clown_pseudo'/>

        <h3 slot="header">custom header</h3>


        <thead>
           
        </thead>
        <tbody>
            <tr class="cartouche" v-for="clown in clowns" :key="clown.id" :style="{ backgroundColor: clown.couleur }">
                <td><img class="img" :src="require(`@/assets/static/img/${clown.pseudo}.jpg`)" /></td>
                <td class="cartouche-info">
                    <h3>{{ clown.pseudo }}</h3>
                </td>
                <td class="cartouche-info">{{ isMan(clown) }}</td>
                <td class="cartouche-info">{{ isMusician(clown) }}</td>


                <td id="show-modal" style="cursor :pointer" @click="showModal = true ; giveId(clown.id); givePseudo(clown.pseudo)">💬</td>
                <!-- <td style="cursor :pointer" @click="goToFilmDelete(movie.id)">🗑</td>-->
            </tr>
        </tbody>
    </table>

</template>

<script>
document.title ="liste des clowns";
import ModalView from '@/components/ModalView.vue'
import axios from 'axios'
const ALL_CLOWNS_READ_API_URL = "http://localhost:8787/api/allClown"


export default {
    name: 'ClownList',
    components: {
        ModalView
    },
    data: () => ({
        showModal: false,
        clowns: [],
        clown_id: '',
        clown_pseudo:'',
    }),

    methods: {

        isMan(clown) {
            let sex = ''
            if (clown.homme == 1) {
                sex = "🧔"
            } else {
                sex = "👩‍🦰"
            }
            return sex
        },


        isMusician(clown) {
            let music = ''
            if (clown.musicien == 1) {
                music = "🎵"
            } else {
                music = ""
            }
            return music
        },

        giveId(id) {
            this.clown_id = id
        },
        givePseudo(pseudo){
            this.clown_pseudo = pseudo
        }

    },
  

    async created() {

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

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
}

.styled-table th {
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    color: black;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}


.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.cartouche {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    align-content: center;
    justify-content: center;
    max-width: 100%;
    margin: 20px;
    overflow: hidden;
    width: 300px;
    height: 50px;
}


.cartouche-info {
    
    padding: 30px;
    position: relative;
    width: 100%;
}
</style>
