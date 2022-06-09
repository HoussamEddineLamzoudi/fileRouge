<template>
    <div class="footer pt-5 pb-5 text-white-50 text-center text-md-start">
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-lg-5">
            <div class="mb-5">
            <a class="navbar-brand" href=""
                ><img
                src="./img/logoWhite.png"
                alt="logo"
                width="152px"
                height="60px"
            /></a>
            </div>
            <p class="mb-4 desc_footer">
            Lorem Ipsum est simplement du faux texte employé dans la composition
            et la mise en page avant impression. Le Lorem Ipsum est le faux
            texte standard de l'imprimerie depuis les années 1500, quand un
            </p>
        </div>

        <div class="col-md-6 col-lg-2">
            <div class="links">
            <h5 class="text-light">Links</h5>
            <ul class="list-unstyled lh-lg">
                <li>Home</li>
                <li>Post</li>
                <li>Chauffeur</li>
                <li>Passager</li>
            </ul>
            </div>
        </div>

        <div class="col-md-6 col-lg-2">
            <div class="links">
            <h5 class="text-light">Fonctionnalité</h5>
            <ul class="list-unstyled lh-lg">
                <li>Ajouter un trajet</li>
                <li>Rechercher</li>
            </ul>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <h5 class="text-light">Email</h5>
            <p class="lh-lg mt-3 mb-5">dinim3ak.contact@gmail.com</p>
            <h5 class="text-light">Numero du telephone</h5>
            <p class="lh-lg mt-3 mb-5">08 19 003 419</p>
            <h5 class="text-light">Réseaux sociaux</h5>
            <div class="icon d-flex justify-content-start">
            <div class="facebook">
                <img
                src="./icons/facebook.png"
                alt="facebook"
                width="25px"
                height="25px"
                />
            </div>
            <div class="instagram ms-3">
                <img
                src="./icons/instagram.png"
                alt="facebook"
                width="25px"
                height="25px"
                />
            </div>
            <div class="twitter ms-3">
                <img
                src="./icons/twitter.png"
                alt="facebook"
                width="25px"
                height="25px"
                />
            </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <p>
            Created by <span class="text-white">HoussamEddine</span> © copyright
            - <span class="text-white">Dini M3ak</span>, 2022
            </p>
        </div>
        </div>
    </div>
    </div>
</template>

<style>
.footer {
  background-color: #9ac9e7;
}

@media screen and (max-width: 768px) {
  .desc_footer {
    display: none;
  }
  .icon {
    margin-left: 34%;
  }
}
</style>

<script>
export default {
  name: "footer-item",
  components: {},
};
</script>
