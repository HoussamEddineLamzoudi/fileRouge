import { createStore } from "vuex";

// Create a new store instance.
// import App from "./App.vue";
// import app from "../main"

export const store = createStore({
  state: {

    localId: false,
    auth: localStorage.getItem("id"),
    userNam: localStorage.getItem("userName"),
    typeUser: localStorage.getItem("typeUser"),
    visible: false,
    rev: false,
    trajets: "",
    backup_trajets:'',
    profileId:localStorage.getItem("profileId"),
  },

  mutations: {
    setVisibility(state, vis){
        state.visible = vis;
    },
    setUser(state, user){
        state.auth = user.id;
        state.userNam = user.userName;
        state.typeUser = user.typeUser;

        localStorage.setItem('id',user.id)
        localStorage.setItem('userName',user.userName)
        localStorage.setItem('typeUser',user.typeUser)

        console.log(this.state.typeUser)
    },
    setVisibility_rev(state, val){
        state.rev = val;
    },
    setBackup(state, vals){
        state.backup_trajets = vals
    },
    setTrajet(state, vals){
        state.trajets = vals
    },
    setProfileId(state, id){
      state.profileId = id
      localStorage.setItem('profileId',id)

    }
  },
});
