const currentUser = {
    state: () => ({
      currentUser: null,
    }),
    mutations: {
        setCurrentUser(context, user){
            context.currentUser = user;
        },
    },
    actions: {
        setCurrentUser(context, user){
            context.commit('setCurrentUser', user);
        },
        signOut(context){
          context.commit("setCurrentUser", null);
          localStorage.removeItem("token");
        }
    },
    getters: {
      currentUser: (state) => state.currentUser,
    },
  };
  
  export default currentUser;
  
  