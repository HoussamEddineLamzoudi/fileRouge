import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";

// .redirected from 

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },

    {
      path: "/contact",
      name: "contactUs",
      component: () => import("../views/contactUs.vue"),
    },

    {
      path: "/chauffeur",
      name: "Chauffeur",
      component: () => import("../views/registerChauffeur.vue"),
    },

    {
      path: "/passager",
      name: "Passager",
      component: () => import("../views/registerPassager.vue"),
    },

    {
      path: "/recherche",
      name: "recherche",
      component: () => import("../views/recherche.vue"),
    },

    {
      path: "/test",
      name: "test",
      component: () => import("../views/test.vue"),
    },

    {
      path: "/login",
      name: "login",
      component: () => import("../components/login_re.vue"),
    },

    {
      path: "/dash",
      name: "dashboard",
      component: () => import("../views/dashboard.vue"),
      children: [
        {
          path: "/dash/prochaine",
          component: () => import("../components/Prochaine_trajets.vue"), 
          beforeEnter: (to, from, next) => {
            if (localStorage.getItem('typeUser') !== 'chauffeur'){
              console.log('pushpush')
              this.$router.go(-1)
            }else{
              next()
            }
          }
        },

        {
          path: "/dash/ancien",
          component: () => import("../components/Anciens_trajets.vue"), 
        },
      ]
    },

    {
      path: "/profile",
      name: "profile",
      component: () => import("../views/profile.vue"),
    },

    {
      path: '/ajTrajet',
      name: 'Ajouter_trajet',
      component: () => import("../views/Ajouter_trajet.vue"),

      beforeEnter: (to, from, next) => {
        if (!localStorage.getItem('id')){
          // this.router.push("/");
          // $store.commit('setVisibility', true)
          next('/login')
        }else{
          next()
        }
      }
    },

    {
      path: '/addReview',
      name: 'addReviewt',
      component: () => import("../views/Ajouter_trajet.vue"),
    },

    

    // router.beforeEach((to, from) => {
    //   if (to.name == 'test' ){
    //     this.router.push("/");
    //   }
    //   if (
    //     to.name === "profiled" ||
    //     to.name === "donors" ||
    //     to.name === "donate") {
    //     if (!localStorage.getItem("token")) {
    //       router.push("/LoginUser");
    //     }
    //   }
    // })

  ],
});

export default router;
