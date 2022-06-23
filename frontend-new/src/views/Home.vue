<template>

    <div class="body">
        <div class="img_head mt-4"><img src="../components/img/background.png"></div>
        <div class="all_cart">
        <div class="carte_etape">

        <div class="carte w-1/2">
            <div>
            <img class="flex justify-center items-center" src="../components/icons/1.png">
            <h3>S'inscrire</h3>
            </div>
            <p>Remplissez vos informations pour vous inscrire en tant que "passager", et vous êtes les bienvenus chez nous</p>
        </div>

        <div class="carte">
            <div>
            <img src="../components/icons/2.png">
            <h3>Recherche a vos<br>trajet</h3>
            </div>
            
            <p>Vous pouvez filtrer les résultats pour affiner votre recherche et consulter les avis sur tous les membres pour vous rassurer.</p>
        </div>

        <div class="carte">
            <div>
            <img src="../components/icons/3.png">
            <h3>Reserver ton premier<br>covoiture </h3>        
            </div>
            <p>Rechercher à vos trajet qui vous convient, contacter le chauffeur, discuter avec lui sur les détails, et voyagez en toute tranquillité</p>
            </div>
        </div>
        </div>
        <div class="offrons">
        <h3 style="color: white;">Ce que nous offrons</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        <button>Ajouter un trajet</button>
        </div>

        <div class="part4">
        <div class="part4_content">
        <div class="part4_img">
            <img src="../components/img/Team.png" alt="">
        </div>
        <div class="part4_desc">
            <h3>Lorem ipsum dolor sit amet</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
        </div>
        </div>
        </div>


        <div class="all_quality">
        <div class="quality_etape">
        <div class="quality">
            <div>
            <img class="resize" src="../components/icons/7sl.png">
            <h3>Vos trajets préférés à petits prix</h3>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <div class="quality">
            <div>
            <img src="../components/icons/Vector.png">
            <h3>Recherchez, Cliquez et réservez !</h3>
            </div>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <div class="quality">
            <div>
            <img src="../components/icons/smile.png">
            <h3>Voyagez en toute confiance</h3>        
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        </div>

        <div class="part5">
        <div class="btns">
            <button>S'inscrire pour chaufeur</button>
            <button>S'inscrire pour passager</button>
        </div>
    </div>


    </div>

</template>

<script>
export default {
    name: 'Home'
    
}


</script>

<style scoped>
    .img_head{
    width: 99vw;
        height: 30%;
        margin-top: -1%;
        margin-left: -1%;
    }
    .img_head img{
        width:100%;
        height:100%;
    }
    .carte_etape{
        display: flex;
        font-size: 12px;
        justify-content: space-between;
        width: 82%;
    }
    .carte{
        width: 31%;
        text-align: center;
        box-shadow: 0px 7px 13px -2px;
        padding: 20px 5px 30px 5px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-bottom: 30px;
    }
    .carte img{
        width: 50px;
    }
    /* .carte p{
    margin-top: 10%;
    } */

    .all_quality{
        width: 98vw;
        display: flex;
        justify-content: center;
        margin-top: 15%;
    }
    .quality_etape{
        display: flex;
        font-size: 12px;
        justify-content: space-between;
        width: 82%;
    }
    .quality{
        width: 31%;
        text-align: center;
        padding: 20px 5px 30px 5px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-bottom: 30px;
        }
    .quality img{
        width: 50px;
    }
    .all_cart{
        width: 98vw;
        display: flex;
        justify-content: center;
        margin-top: 15%;
    }
    /* .carte p{
    margin-top: 10%;
    } */

    .all_quality{
        width: 98vw;
        display: flex;
        justify-content: center;
        margin-top: 15%;
    }
    .body{
        padding-bottom:5%;  

        /* padding: 0px;
        margin: 0px;
        -webkit-box-sizing: border-box;
                box-sizing: border-box; */
    }

    h3{
        color: #268ece;
    }
    .offrons{
        background: #268ece;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px 0px;
        margin-top: 10%;
        width: 99vw;
        margin-left: -1%;
        justify-content: space-between;
        height: 180px;
        color: white;
    }
    .offrons button{
        background: white;
        border: none;
        padding: 12px 25px;
        color: #268ece;
        border-radius: 10px;
        font-weight: bold;
    }
    .part4_content{
        display: flex; 
        width: 75%;
        height: 240px;
        justify-content:space-between;
    }
    .part4_img{
        width: 48%;
    }
    .part4_img img{
        width: 100%; 
        height: 100%;
    }

    .part4_desc{
        width: 48%; 
        text-align: center; 
        display: flex; 
        flex-direction: column; 
        justify-content: flex-start;
    }

    .part4{
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 15%;
    }

    .resize{
        width: 55px;
    }

    .btns{
        display: flex;
        width: 55%;
        justify-content: space-between;
    }
    .btns button{
        width: 45%;
        background-color: #268ece;
        border: none;
        color: white;
        font-weight: bold;
        font-size: 15px;
        padding: 15px;
        border-radius: 7px;
    }
    .part5{
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 10%;
    }

    /* h3 {
    margin: 40px 0 0;
    }
    ul {
    list-style-type: none;
    padding: 0;
    }
    li {
    display: inline-block;
    margin: 0 10px;
    }
    a {
    color: #42b983;
    } */

    @media only screen and (max-width: 600px) {
        .img_head{
            width: 100vw;
            margin-top: -2%;
            margin-left: -2%;
        }
        .all_cart{
            width: 98vw;
            display: flex;
            justify-content: center;
            margin-top: 15%;
        }
        .carte_etape{
            display: flex;
            font-size: 12px;
            justify-content: space-between;
            width: 82%;
            height: 700px;
            flex-wrap: wrap;
            flex-direction: column;
        }
        .carte{
            width: 95%;
            text-align: center;
            box-shadow: 0px 7px 13px -2px;
            padding: 20px 5px 30px 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-bottom: 30px;
        }
        .offrons{
            background: #268ece;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 0px;
            margin-top: 10%;
            width: 100vw;
            margin-left: -2%;
            justify-content: space-between;
            height: 286px;
            color: white;
            text-align: center;
        }
        .part4{
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 0%;
        }
        .part4_content{
            display: flex;
            width: 100%;
            height: 237px;
            justify-content: space-between;
            flex-direction: column;
        }
        .part4_img{
            width: 104%;
            margin-left: -2%;
        }
        .part4_desc{
            width: 100%;
            text-align: center;
            margin-top: 5%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .all_quality{
            width: 98vw;
            display: flex;
            justify-content: center;
            margin-top: 76%;
        }
        .quality_etape{
            display: flex;
            font-size: 12px;
            justify-content: space-between;
            width: 82%;
            flex-direction: column;
        }
        .quality{
            width: 97%;
            text-align: center;
            padding: 20px 5px 30px 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-bottom: 30px;
        }
        .part5{
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 10%;
        }
        .btns{
            display: flex;
            width: 83%;
            height: 120px;
            justify-content: space-between;
            flex-direction: column;
        }
        .btns button {
            width: 100%;
            background-color: #268ece;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
            padding: 15px;
            border-radius: 7px;
        }
    }
</style>

