const nav = {
    state: () => ({
        nav: [
            {
                name: "Home",
                path: "/",
                icon: "home"
            },
            {
                name: "Products",
                path: "/products",
                icon: "list" 
            },
            {
                name: "Orders",
                path: "/orders",
                icon: "shopping-cart"
            },
            {
                name: "Customers",
                path: "/customers",
                icon: "user"
            },
            {
                name: "Landing Page",
                path: "/edit",
                icon: "palette"
            },
        ]
    }),
    getters: {
        routes: state => state.nav
    }
}

export default nav;