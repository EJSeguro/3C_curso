<script setup>

</script>

<template>
    <header>
        <RouterLink class="home">
            <img src="./assets/DigimonHead.png" />
        </RouterLink>
        <div class="favoritesRouterLink">
            <RouterLink>
                <img src="./assets/Digivice_tri.webp" />
                <p>Favorites</p>
            </RouterLink>
        </div>
    </header>

    <RouterView></RouterView>
</template>

<style>
* {
    padding: 0;
    margin: 0;
}

header {
    display: flex;
    height: 20vh;
    width: 100vw;
    justify-content: space-evenly;
    align-items: center;
    background-color: #FDCF34;
    box-shadow: 0px 12px 50px -2px black;
}

header img {
    height: 100px;
}

.favoritesRouterLink{
  margin-left: 5%;
  text-align: center;
  font-weight: 600;
  font-size: 20px; 
  
}

.favoritesRouterLink a{
  text-decoration: none;
  color: #B76E1A;
  text-shadow: 0 1px 0 white;
}

.favoritesRouterLink img{
  height: 70px;
}

.home{
  margin-left: 26%;
  text-align: center;
}
</style>