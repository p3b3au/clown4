<template>
  <transition name="modal" class="modal-overlay" >
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <div class="modal-header">
            <slot name="footer">
                <button class="modal-default-button" @click="$emit('close')">
                  OK
                </button>
              </slot>
                        <tr
              class="cartouche"
              v-for="clown in clowns"
              :key="clown.id"
              :style="{ backgroundColor: clown.couleur }"
            >
              <td>
                <img
                  class="img"
                  :src="require(`@/assets/static/img/${clown.pseudo}.jpg`)"
                />
              </td>
              <td class="cartouche-info">
                <h3>{{ clown.pseudo }}</h3>
              </td>
              <td class="cartouche-info">{{ isMan(clown) }}</td>
              <td class="cartouche-info">{{ isMusician(clown) }}</td>

              <td
                id="show-modal"
                style="cursor: pointer"
                @click="
                  showModal = true;
                  giveId(clown.id);
                  givePseudo(clown.pseudo);
                "
              >
                💬
              </td>
              <!-- <td style="cursor :pointer" @click="goToFilmDelete(movie.id)">🗑</td>-->
            </tr>

            <div class="modal-footer">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>
<script>
import axios from "axios";
const ALL_CLOWNS_READ_API_URL = "http://localhost:8787/api/allClown";



export default {
  name: "ModalView",
  props: {
    clownId: {
      type: String,
    },
    clownPseudo: {
      type: String,
    },
  },
  data: () => ({
    clowns: [],
  }),
  methods: {

        isMan(clown) {
            let sex = ''
            if (clown.homme == true) {
                sex = "🧔"
            } else {
                sex = "👩‍🦰"
            }
            return sex
        },


        isMusician(clown) {
            let music = ''
            if (clown.musicien == true) {
                music = "🎵"
            } else {
                music = ""
            }
            return music
        },

        

    },
  

    async created() {

        const clownsdb = await axios.get(ALL_CLOWNS_READ_API_URL)
        this.clowns = clownsdb.data
        console.log(this.clowns)
    },
}
</script>

<style>
@import "@/assets/static/css/modal-style.css";

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

  