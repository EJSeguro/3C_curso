<script setup>
</script>

<template>
    <div class="cardDigimon">
       

        <img src="../../public/favicon.ico" />
        <div class="infoCards">
            <div class="digimon">
                <p>Name</p>
                <p>LVL 1.</p>
                <img class="favStar" src="../assets/star-solid.svg" />
            </div>
            <div class="types">
                <p>Tipo1</p>
                <p>Tipo2</p>
               <img class="xAntiBodyIcon" src="../assets/xAntiBodyIcon.png" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.cardDigimon {
    display: flex;
    flex-direction: column;
    border-radius: 15px;
    height: 40vh;
    width: 20vw;
    background: rgb(119,189,226);
    background: linear-gradient(90deg, rgba(119,189,226,1) 0%, rgba(14,119,184,1) 35%, rgba(21,70,120,1) 100%);
}

.cardDigimon img {
    height: 45%;
    width: 86%;
    padding: 20px;
}

.digimon {
    display: flex;
    justify-content: space-evenly;
    margin-bottom:  5%;
}

.types {
    display: flex;
    justify-content: space-around;
}

.types p {
    margin-top: 25px;
}

.digimon p {
    margin-top: 25px;
}

.types .xAntiBodyIcon{
    height: 30px;
    width: 30px;
}

.digimon .favStar {
    width: 30px;
}
</style>