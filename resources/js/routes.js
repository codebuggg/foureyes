import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./views/Home";
import SignUp from "./views/SignUp";
import SignIn from "./views/SignIn";
import Cart from "./views/Cart";
import Products from "./views/Products/Index";
import ShowProduct from "./views/Products/Show";
import Orders from "./views/Orders/Index";
import Checkout from "./views/Checkout";
import ShowOrder from "./views/Orders/Show";
import Register from "./register";

import Admin from "./views/admin/Dashboard";
import AdminProducts from "./views/admin/AdminProdutcs";
import AdminOrders from "./views/admin/AdminOrders";
import ProductsForm from "./views/admin/ProductsForm";
import Landing from "./views/admin/Landing";
import Customers from "./views/admin/Customers";

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },
    {
      path: "/sign_up",
      name: "sign_up",
      component: SignUp,
    },
    {
      path: '/sign_in',
      name: 'sign_in',
      component: SignIn,
    },
    {
      path: '/cart',
      name: 'cart',
      component: Cart,
    },
    {
      path: '/products',
      name: 'products',
      component: Products,
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: ShowProduct,
    },
    {
      path: '/orders',
      name: 'orders',
      component: Orders,
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: Checkout,
    },
    {
      path: '/orders/:id',
      name: 'orders.show',
      component: ShowOrder,
    },
    {
      path: '/admin/',
      name: 'Admin',
      component: Admin,
      meta: {
        auth: true,
      }
    },
    {
      path: '/admin/products',
      name: 'AdminProducts',
      component: AdminProducts,
      meta: {
        auth: true,
      }
    },
    {
      path: '/admin/orders',
      name: 'AdminOrders',
      component: AdminOrders,
      meta: {
        auth: true,
      }
    },
    {
      path: '/admin/products/create',
      name: 'ProductsForm',
      component: ProductsForm,
      meta: {
        auth: true,
      }
    },
    {
      path: '/admin/edit',
      name: 'Landing',
      component: Landing,
      meta: {
        auth: true,
      }
    },
    {
      path: '/admin/customers',
      name: 'Customers',
      component: Customers,
      meta: {
        auth: true,
      }
    },
    {
      path: '/admin/products/:id/edit',
      name: 'EditProductsForm',
      component: ProductsForm,
      meta: {
        auth: true,
      }
    },
  ]
})

router.beforeEach(async (to, from, next) => {
  if (to.matched.some(record => record.meta.auth)) {
    if (localStorage.getItem('token') == null) {
      next({
        path: '/sign_up',
        params: { nextUrl: to.fullPath }
      })
    }else{
      try {
        const res = await authFetch("user");
        if(res.status == 200){
          const body = await res.json();
          router.app.$store.dispatch('setCurrentUser', body);
          next();
        }else{
          next({
            path: '/sign_up',
            params: { nextUrl: to.fullPath }
          })
        }
      } catch (e) {
        console.log(e);
      }
    }
  }
  else next();
})

export default router;
