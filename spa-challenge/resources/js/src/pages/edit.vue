<template>
<div>
    <!-- <Sidebar /> -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">Edit Product</div>
                <div class="card-body">
                    <form @submit.prevent="submitPost(id)">
                    <div class="form-group mb-2">
                        <input type="text" v-model="product.product_name" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group mb-2">
                        <textarea v-model="product.harga_barang" rows="5" placeholder="Description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <router-link to="/product" class="btn btn-warning">Back</router-link>
                        <button class="btn btn-success">Save</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div> 
    </div>
</div>
</template>
<script>
// import Sidebar from '../layouts/sidebar.vue'
import axios from 'axios'
export default {
    // components: {
    //     Sidebar,
    //   },
    // name: 'editProduct',
  data () {
    return {
      id: '',
      product: {
        product_name:'',
        harga_barang:''
      },
      errors: []
    }
  },
  async mounted () {
    this.id = this.$route.params.id
    await this.productEdit(this.$route.params.id)
  },
  methods: {
    async submitPost (id) {
      const data = await axios.post(`/api/update/${id}`, this.product)
      if (data.status) {
        this.$router.push({path:'/product'})
        this.product = data.data
      }
    },
    async productEdit (id) {
      const data = await axios.get( `/api/edit/${id}`)
      this.product.product_name = data.data.data.product_name
      this.product.harga_barang = data.data.data.harga_barang
    }
  }
}
</script>