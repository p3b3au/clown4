<template>
     <header class='mymenu'>
        <nav>
          <ul class='mymenu'>
             <li v-for="(menu,idx) in menuLinks" :key="idx"> 
               <router-link :to="{name:menu.routeName}">{{menu.label}}</router-link>
             </li>    
             <li><a href="http://localhost:8787/lieu">Lieux</a></li>
             <li><a href="http://localhost:8787/interv">Interv</a></li>
          </ul>
    </nav> 
      
   </header>  
    
     
</template>

<script>
export default{
     name:'HeaderView',
     data:()=>({
      menuLinks:[
        {
          routeName:'home',
          label:'Accueil'
        },         
        {
          routeName:'ClownList',
          label:"Clowns"
        },    
        {
          routeName:'PlanningBase',
          label:"Voir Planning"
        },    
        {
          routeName:'PlanningTest',
          label:"//// Editer PlanningTest ////"
        },
             
             {
          routeName:'EditTest',
          label:"EditTest"
        },
      ]
    })
}

</script>

<style>

</style>