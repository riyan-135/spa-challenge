import HomeIndex from './pages/home.vue'
import IndexProduct from './pages/index.vue'
import EditProduct from './pages/edit.vue'


export const router = [
        {
            path: '/',
            name: 'home',
            component: HomeIndex,
        },

        {
            path: '/product',
            name: 'product',
            component: IndexProduct
        },

        {
            path: '/product/:id/edit',
            name: 'editProduct',
            component: EditProduct
        }
	]
