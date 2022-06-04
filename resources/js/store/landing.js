const landing = {
    state: () => ({
        hero: {
            title: "Summer styles are finally here",
            subtitle: "This year, our new summer collection will shelter you from the harsh elements of a world that doesn't care if you live or die.",
            imgs: [
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg",
            ]
        },
        shopByCategory: {
            first: {
            title: "New Arrivals",
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-featured-category.jpg",
            },
            second: {
            title: "Accessories",
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-category-01.jpg"
            },
            third: {
            title: "Workspace",
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-category-02.jpg"
            }
        },
        featuredSection: {
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-feature-section-full-width.jpg",
            title: "Long-term thinking",
            subtitle: "We're committed to responsible, sustainable, and ethical manufacturing. Our small-scale approach allows us to focus on quality and reduce our impact. We're doing our best to delay the inevitable heat-death of the universe."
        }
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
  
  export default landing;
  
  