const cartModule = {
  state: () => ({
    cart: {
      items: [],
      show: false,
    },
  }),
  mutations: {
    addToCart(context, cartProduct){
      const cartItems = context.cart.items;
      const addedToCart = cartItems.filter((cartItem) => cartItem.product.id == cartProduct.product.id );
      if(addedToCart.length > 0){
        // product is already in cart
        const cartItem = addedToCart[0];
        const i = cartItems.indexOf(cartItem);
        cartItems[i].quantity += 1; // increase the quantity of the product by one
      }else {
        cartItems.push({
          quantity: 1,
          ...cartProduct
        });
      }
    },
    showCart(context){
      context.cart.show = !context.cart.show;
    },
    setCart(context, cart){
      context.cart.items = cart;
    },
    removeFromCart(context, cart){
      const cartItems = context.cart.items;
      const itemToBeRemoved = cartItems.filter((cartItem) => {
        return cartItem.product.id == cart;
      });
      const cartItem = itemToBeRemoved[0];
      const i = cartItems.indexOf(cartItem);
      if(cartItem.quantity > 1){
        cartItem.quantity -= 1;
      }else {
        cartItems.splice(i, 1);
      }
    },
  },
  actions: {
    async addToCart(context, cartProduct){
      context.commit('addToCart', cartProduct);
      context.commit('showCart');
      const cartId = localStorage.getItem('cart-id');
      const res = await authFetch(`carts/${cartId}/products`, {
        method: "POST",
        body: {
          product_id: cartProduct.product.id,
          color_id: cartProduct.color.id,
        }
      });
    },
    showCart(context){
      context.commit('showCart');
    },
    setCart(context, cart){
      context.commit('setCart', cart);
    },
    async removeFromCart(context, cart){
      context.commit('removeFromCart', cart);
      const cartId = localStorage.getItem('cart-id');
      fetch(`/api/carts/${cartId}/products/${cart}`, {method: "delete"})
    },
    async fetchCartItems(context){
      var cartId = localStorage.getItem('cart-id');
      if(!cartId){
        var res = await authFetch("carts", {
          method: "POST"
        });
        if(res.status == 201){
          const body = await res.json();
          localStorage.setItem('cart-id', body.id);
          cartId = body.id;
        }
      }
      res = await authFetch(`carts/${cartId}/products`);
      if(res.status == 200){
        const body = await res.json();
        context.commit('setCart', body);
      }
    }
  },
  getters: {
    subtotal: state => {
      var total = 0;
      state.cart.items.forEach(({
        product,
        quantity,
      }) => {
        const {
          price,
        } = product;
        total += (price * quantity);
      });
      return total;
    },
    cartSize: state => state.cart.items.length,
  },
};

export default cartModule;

